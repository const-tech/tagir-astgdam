@section('title', 'اعدادات الشجرة')
<div class="main-side">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li href="" class="breadcrumb-item" aria-current="page">
                @lang('Home')
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                اعدادات شجرة الحسابات
            </li>
        </ol>
    </nav>

    <div class="container-fluid">

        <div class="bg-white shadow p-4 rounded-3">
            <div class="table-responsive">
                <table class="table main-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الخدمة</th>
                            <th>الحساب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <select wire:change="save('{{ $item['model'] }}',$event.target.value)"
                                        wire:model="{{ $item['model'] }}" class="form-select">
                                        <option value="">اختر الحساب</option>
                                        @foreach ($accounts as $account)
                                            <option {{ setting($item['model']) == $account->id ? 'selected' : '' }}
                                                value="{{ $account->id }}">{{ $account->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
