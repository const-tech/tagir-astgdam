<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Document;
use App\Models\Deduction;
use App\Models\Commission;
use App\Models\Nationality;
use App\Models\Settlement;
use Livewire\WithFileUploads;

class ShowEmployee extends Component
{
    use WithFileUploads;
    public $employee;
    public $password, $password_confirmation, $phone, $email, $image;

    public $name, $first_name, $last_name, $work_type_id, $second_name,
        $status, $nationality, $start_id_number, $job, $side_job, $start_work, $birthday;
    public $id_number, $end_id_number, $end_work, $end_passport, $end_insurance, $address, $bank_account, $insurance_company_id;

    public $document_name, $document_type, $document_file, $document_edit = false, $document;
    public $commission_name, $commission_value, $commission_type, $commission_value_type,
        $commission_edit = false, $commission;
    public $deduction_name, $deduction_amount, $deduction_type, $deduction_edit = false, $deduction;
    public $settlement_name, $settlement_amount, $settlement_type, $settlement_amount_type, $settlement_edit = false, $settlement;
    public $gender, $nationality_id;

    public $health_card, $start_health_card, $end_health_card;
    public $driver_card, $start_driver_card, $end_driver_card;
    public $is_employee, $start_is_employee, $end_is_employee;
    public $resident, $start_resident, $end_resident;



    public function mount($employee)
    {
        $employee = User::find($employee);
        if (!$employee) {
            abort(404);
        }
        $this->employee = $employee;
        $this->phone = $employee->phone;
        $this->email = $employee->email;
        $this->image = $employee->image;
        $this->name = $employee->name;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->work_type_id = $employee->work_type_id;
        $this->second_name = $employee->second_name;
        $this->status = $employee->status;
        $this->nationality = $employee->nationality;
        $this->start_id_number = $employee->start_id_number;
        $this->job = $employee->job;
        $this->side_job = $employee->side_job;
        $this->start_work = $employee->start_work;
        $this->id_number = $employee->id_number;
        $this->end_id_number = $employee->end_id_number;
        $this->end_work = $employee->end_work;
        $this->end_passport = $employee->end_passport;
        $this->end_insurance = $employee->end_insurance;
        $this->address = $employee->address;
        $this->bank_account = $employee->bank_account;
        $this->insurance_company_id = $employee->insurance_company_id;
        $this->birthday = $employee->birthday;
        $this->nationality_id = $employee->nationality_id;
        $this->gender = $employee->gender;

        $this->health_card = $employee->health_card;
        $this->start_health_card = $employee->start_health_card;
        $this->end_health_card = $employee->end_health_card;

        $this->driver_card = $employee->driver_card;
        $this->start_driver_card = $employee->start_driver_card;
        $this->end_driver_card = $employee->end_driver_card;

        $this->is_employee = $employee->is_employee;
        $this->start_is_employee = $employee->start_is_employee;
        $this->end_is_employee = $employee->end_is_employee;

        $this->resident = $employee->resident;
        $this->start_resident = $employee->start_resident;
        $this->end_resident = $employee->end_resident;
    }
    public function render()
    {
        $documents = Document::where('user_id', $this->employee->id)->get();
        $commissions = Commission::where('user_id', $this->employee->id)->get();
        $deductions = Deduction::where('user_id', $this->employee->id)->get();
        $settlements = Settlement::where('user_id', $this->employee->id)->get();
        $nationalities = Nationality::all();
        return view('livewire.admin.show-employee', compact(
            'documents',
            'commissions',
            'deductions',
            'settlements',
            'nationalities'
        ))
            ->extends('admin.layouts.admin')->section('content');
    }

    public function changePassword()
    {
        $this->validate([
            'password' => 'required|confirmed'
        ]);

        $this->employee->update([
            'password' => $this->password
        ]);

        session()->flash('success', 'تم تغيير كلمة المرور بنجاح');
    }

    public function updateLoginInfo()
    {
        $this->validate([
            'phone' => 'required|digits:10|unique:users,phone,' . $this->employee->id,
            'email' => 'required|email|unique:users,email,' . $this->employee->id
        ]);

        $this->employee->update([
            'phone' => $this->phone,
            'email' => $this->email
        ]);

        session()->flash('success', 'تم تغيير بيانات الدخول بنجاح');
    }

    public function updatePersonalImage()
    {
        if ($this->image) {
            if ($this->employee->image !== $this->image) {
                delete_file($this->employee->image);
                $imagePath = store_file($this->image, 'employes');
                $this->employee->update([
                    'image' => $imagePath
                ]);
            }
            session()->flash('success', 'تم تغيير الصورة الشخصية بنجاح');
        }
    }

    public function validateMainInfo()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'nullable',
            'status' => 'required|in:active,inactive,resigned,fired,death,exit_and_return,final_exit',
            'nationality' => 'required|in:sudia,not-sudia',
            'id_number' => 'required',
            'end_id_number' => 'required',
            'phone' => 'required',
            'birthday' => 'nullable',
            'address' => 'nullable',
            'nationality_id' => 'nullable',
            'gender' => 'nullable',


            'health_card' => ['nullable'],
            'start_health_card' => 'required_if:health_card,1',
            'end_health_card' => 'required_if:health_card,1',

            'driver_card' => ['nullable'],
            'start_driver_card' => 'required_if:driver_card,1',
            'end_driver_card' => 'required_if:driver_card,1',

            'is_employee' => ['nullable'],
            'start_is_employee' => 'required_if:is_employee,1',
            'end_is_employee' => 'required_if:is_employee,1',

            'resident' => ['nullable'],
            'start_resident' => 'required_if:resident,1',
            'end_resident' => 'required_if:resident,1',
        ];
    }
    public function updateMainInfo()
    {
        $data = $this->validate($this->validateMainInfo());
        $this->employee->update($data);
        session()->flash('success', 'تم تغيير بيانات الموظف بنجاح');
    }

    public function editDocument($id)
    {
        $this->document_edit = true;
        $this->document = Document::find($id);
        $this->document_name = $this->document->document_name;
        $this->document_file = $this->document->document_file;
        $this->document_type = $this->document->document_type;
    }
    public function saveDocument()
    {
        $data = $this->validate([
            'document_name' => 'required',
            'document_type' => 'nullable',
            'document_file' => 'required'
        ]);

        if ($this->document_file) {
            if ($this->document_edit) {
                if ($this->document->document_file !== $this->document_file) {
                    delete_file($this->document->image);
                    $data['document_file'] = store_file($this->document_file, 'documents');
                }
            } else {
                $data['document_file'] = store_file($this->document_file, 'documents');
            }
        }

        if ($this->document_edit) {
            $this->document->update($data);
        } else {
            $this->employee->documents()->create($data);
        }

        $this->document_edit = false;
        $this->document_name = null;
        $this->document_file = null;
        $this->document_type = null;
        session()->flash('success', 'تم حفظ المستند بنجاح');
    }

    public function deleteDocument($id)
    {
        $document = Document::find($id);
        if ($document) {
            delete_file($document->document_file);
            $document->delete();
            session()->flash('success', 'تم حذف المستند بنجاح');
        }
    }

    public function editCommission($id)
    {
        $commission = Commission::find($id);
        if ($commission) {
            $this->commission = $commission;
            $this->commission_edit = true;
            $this->commission_name = $commission->commission_name;
            $this->commission_value = $commission->commission_value;
            $this->commission_type = $commission->commission_type;
            $this->commission_value_type = $commission->commission_value_type;
        }
    }

    public function saveCommission()
    {
        $data = $this->validate([
            'commission_name' => 'required',
            'commission_value' => 'required',
            'commission_type' => 'required|in:with_tax,without_tax',
            'commission_value_type' => 'required|in:fixed,percentage',
        ]);

        if ($this->commission_edit) {
            $this->commission->update($data);
        } else {
            $this->employee->commissions()->create($data);
        }

        $this->commission_edit = false;
        $this->reset(['commission_name', 'commission_value', 'commission_type', 'commission_value_type']);

        session()->flash('success', 'تم حفظ العمولة بنجاح');
    }

    public function deleteCommission($id)
    {
        $commission = Commission::find($id);
        if ($commission) {
            $commission->delete();
            session()->flash('success', 'تم حذف العمولة بنجاح');
        }
    }

    public function editDeduction($id)
    {
        $deduction = Deduction::find($id);
        if ($deduction) {
            $this->deduction = $deduction;
            $this->deduction_edit = true;
            $this->deduction_name = $deduction->deduction_name;
            $this->deduction_amount = $deduction->deduction_amount;
            $this->deduction_type = $deduction->deduction_type;
        }
    }
    public function saveDeduction()
    {
        $data = $this->validate([
            'deduction_name' => 'required',
            'deduction_amount' => 'required|numeric',
            'deduction_type' => 'required|in:with_tax,without_tax',
        ]);

        if ($this->deduction_edit) {
            $this->deduction->update($data);
        } else {
            $this->employee->deductions()->create($data);
        }

        $this->deduction_edit = false;
        $this->reset(['deduction_name', 'deduction_amount', 'deduction_type']);

        session()->flash('success', 'تم حفظ الخصم بنجاح');
    }

    public function deleteDeduction($id)
    {
        $deduction = Deduction::find($id);
        if ($deduction) {
            $deduction->delete();
            session()->flash('success', 'تم حذف الخصم بنجاح');
        }
    }

    public function editSettlement($id)
    {
        $settlement = Settlement::find($id);
        if ($settlement) {
            $this->settlement = $settlement;
            $this->settlement_edit = true;
            $this->settlement_name = $settlement->settlement_name;
            $this->settlement_amount = $settlement->settlement_amount;
            $this->settlement_type = $settlement->settlement_type;
            $this->settlement_amount_type = $settlement->settlement_amount_type;
        }
    }
    public function saveSettlement()
    {
        $data = $this->validate([
            'settlement_name' => 'required',
            'settlement_amount' => 'required|numeric',
            'settlement_type' => 'required|in:with_tax,without_tax',
            'settlement_amount_type' => 'required|in:fixed,percentage',
        ]);

        if ($this->settlement_edit) {
            $this->settlement->update($data);
        } else {
            $this->employee->settlements()->create($data);
        }

        $this->settlement_edit = false;
        $this->reset(['settlement_name', 'settlement_amount', 'settlement_type', 'settlement_amount_type']);

        session()->flash('success', 'تم حفظ التسديد بنجاح');
    }

    public function deleteSettlement($id)
    {
        $settlement = Settlement::find($id);
        if ($settlement) {
            $settlement->delete();
            session()->flash('success', 'تم حذف التسديد بنجاح');
        }
    }
}
