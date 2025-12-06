<?php

namespace App\Livewire;

use App\Exports\ClientsExport;
use App\Models\City;
use App\Models\Country;
use App\Models\Level;
use App\Models\Notification;
use App\Models\NotificationLibrary;
use App\Models\Program;
use App\Models\Region;
use App\Models\State;
use App\Models\User;
use App\Models\WhatsappMessage;
use App\Services\FCMService;
use App\Services\Whatsapp;
use App\Traits\livewireResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;


class Clients extends Component
{
    use livewireResource, WithFileUploads;

    public $name, $phone, $city_id, $type = 'client', $notes, $search, $cities,
        $programs, $possibleCients, $interestedCients,
        $notInterestedCients, $trueCients, $filter_active,
        $filter_city, $filter_program, $users, $filter_user,
        $client, $message, $image, $address, $pst, $contact, $class, $email, $status, $active = 1, $password;
    public $country_id, $state_id, $level_id, $region, $library_id, $tax_number;
    public $national_address, $file_national_address, $manager_identity, $file_manager_identity, $commercial_register, $file_commercial_register, $vat_certificate, $file_vat_certificate;

    public $contracts =[];
    public Collection $allClients;

    public function setModelName()
    {
        $this->model = 'App\Models\User';
    }
    public function addContract()
    {
        $this->contracts[] = [
            'contract_path' => null,
            'start_date' => null,
            'end_date' => null
        ];
    }

    public function removeContract($index)
    {
        unset($this->contracts[$index]);
        $this->contracts = array_values($this->contracts);
    }

    public function export()
    {
        return Excel::download(new ClientsExport($this->allClients), 'clients' . time() . '.xlsx');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => ['required', 'unique:users,phone,' . $this->obj?->id],
            'email' => ['nullable', 'unique:users,email,' . $this->obj?->id],
            'type' => 'nullable',
            'password' => 'nullable',
            'active' => 'nullable',
            'tax_number' => 'nullable',
            'commercial_register' => 'nullable',
            'national_address' => 'nullable',
            'file_national_address' => 'nullable',
            'manager_identity' => 'nullable',
            'file_manager_identity' => 'nullable',
            'file_commercial_register' => 'nullable',
            'vat_certificate' => 'nullable',
            'file_vat_certificate' => 'nullable',
            'city_id' => 'nullable|exists:cities,id',
        ];
    }

    public function toggle($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();
    }
    public function whileEditing()
    {
        $this->contracts = $this->obj->contracts()->get()->toArray();
    }


    public function mount()
    {
        $this->cities = City::query()->get() ?? [];
        $this->programs = Program::all();
        $this->allClients = User::where('type', 'client')->get();
        $this->users = User::all();
        //        $this->possibleCients = Client::where('status', 'possible')->count();
        //        $this->interestedCients = Client::where('status', 'interested')->count();
        //        $this->notInterestedCients = Client::where('status', 'not_interested')->count();
        //        $this->trueCients = Client::where('status', 'true')->count();
        if (request('city_id')) {
            $this->filter_city = request('city_id');
        }
    }

    public function beforeSubmit()
    {
        $this->data['password'] = '1';

        if ($this->file_national_address) {
            if ($this->obj) {
                if ($this->obj->file_national_address !== $this->file_national_address) {
                    delete_file($this->obj->file_national_address);
                    $this->data['file_national_address'] = store_file($this->file_national_address, 'clients');
                }
            } else {
                $this->data['file_national_address'] = store_file($this->file_national_address, 'clients');
            }
        }
        if ($this->file_manager_identity) {
            if ($this->obj) {
                if ($this->obj->file_manager_identity !== $this->file_manager_identity) {
                    delete_file($this->obj->file_manager_identity);
                    $this->data['file_manager_identity'] = store_file($this->file_manager_identity, 'clients');
                }
            } else {
                $this->data['file_manager_identity'] = store_file($this->file_manager_identity, 'clients');
            }
        }
        if ($this->file_vat_certificate) {
            if ($this->obj) {
                if ($this->obj->file_vat_certificate !== $this->file_vat_certificate) {
                    delete_file($this->obj->file_vat_certificate);
                    $this->data['file_vat_certificate'] = store_file($this->file_vat_certificate, 'clients');
                }
            } else {
                $this->data['file_vat_certificate'] = store_file($this->file_vat_certificate, 'clients');
            }
        }
        if ($this->file_commercial_register) {
            if ($this->obj) {
                if ($this->obj->file_commercial_register !== $this->file_commercial_register) {
                    delete_file($this->obj->file_commercial_register);
                    $this->data['file_commercial_register'] = store_file($this->file_commercial_register, 'clients');
                }
            } else {
                $this->data['file_commercial_register'] = store_file($this->file_commercial_register, 'clients');
            }
        }
        // if ($this->password) {
        //     $this->data['password'] = Hash::make($this->password);
        // } else {
        //     $this->data['password'] = $this->obj->password;
        // }
    }

    public function send_notification()
    {
        $user = $this->client;
        $this->validate(['library_id' => 'required|exists:notification_libraries,id']);
        $library = NotificationLibrary::findOrFail($this->library_id);
        Notification::create(['user_id' => $user->id, 'library_id' => $this->library_id, 'title' => $library->content]);
        session()->flash('success', 'تم الارسال بنجاح');
    }

    public function render()
    {
        // dd($this->filter_city);
        $clients = User::clients()->with(['city'])->where(function ($q) {
            if ($this->search) {
                $q->where('name', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('phone', $this->search)
                    ->orWhere('email', $this->search);
            }
            if ($this->filter_active == 'active') {
                $q->where('active', 1);
            }
            if ($this->filter_active == 'inactive') {
                $q->where('active', 0);
            }
            if ($this->filter_city) {
                $q->where('city_id', $this->filter_city);
            }
        })->latest('id')->paginate();
        // $levels = Level::latest()->get();
        // $countries = Country::latest()->get();
        // $states = State::where('country_id', $this->country_id)->latest()->get();
        // $regions = Region::where('state_id', $this->state_id)->latest()->get();
        $cities = City::latest()->get();
        return view('livewire.clients.index', compact('clients', 'cities'));
    }

    public function clientId($id)
    {
        $this->client = User::find($id);
    }

    public function sendToWhatsapp()
    {
        $this->validate([
            'message' => 'required',
            'image' => 'nullable|image',
        ]);

        try {
            DB::beginTransaction();

            if ($this->image) {
                $image = store_file($this->image, 'messages');

                $message = WhatsappMessage::create([
                    'message' => $this->message,
                    'image' => $image,
                    'client_id' => $this->client->id,
                    'user_id' => auth()->user()->id,
                ]);

                Whatsapp::sendWithImage($this->client->phone, $this->message, display_file($message->image));
            } else {
                WhatsappMessage::create([
                    'message' => $this->message,
                    'client_id' => $this->client->id,
                    'user_id' => auth()->user()->id,
                ]);

                Whatsapp::send($this->client->phone, $this->message);
            }

            DB::commit();

            $this->client->update(['contact' => true]);
            $this->reset();
            session()->flash('success', 'تم الارسال بنجاح');
            $this->dispatch('alert', ['type' => 'success', 'message' => 'تم الارسال بنجاح']);
        } catch (\Exception $ex) {
            DB::rollback();
            //dd($ex->getMessage());
            session()->flash('success', 'حدث خطأ أثناء الارسال');
            $this->dispatch('alert', ['type' => 'error', 'message' => 'حدث خطأ أثناء الارسال']);
        }
    }
    public function afterSubmit(): void
    {
        if (count($this->contracts)){
            foreach ($this->contracts as $index => $contract){
                if (is_file($contract['contract_path'])){
                    $this->contracts[$index]['contract_path'] = store_file($contract['contract_path'], 'clients');
                }
            }
        }
        $this->obj->contracts()->delete();
        $this->obj->contracts()->createMany($this->contracts);
    }



}
