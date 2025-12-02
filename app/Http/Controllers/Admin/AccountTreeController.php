<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountTreeController extends Controller
{
    public function index()
    {
        return view('admin.accounts.tree');
    }

    public function store(Request $request)
    {
        $data =$request->validate([
            'name' => 'required',
            'code' => 'required',
            'parent_id' => 'required',
        ]);
        Account::create($data);
        return back()->with('success','تم اضافة الحساب بنجاح');
    }
    public function update(Request $request)
    {
        $data =$request->validate([
            'id' => 'required|exclude',
            'name' => 'required|unique:accounts,name,'.$request->id,
            'code' => 'required|unique:accounts,code,' . $request->id,
        ]);
        $account = Account::find($request->id);
        $account->update($data);
        return back()->with('success','تم تعديل الحساب بنجاح');
    }
    public function getTreeData()
    {
        $accounts = Account::all();
        $treeData = [];

        foreach ($accounts as $account) {
            $treeData[] = [
                'id' => $account->id,
                'parent' => $account->parent_id ?? '#',
                'text' => $account->code . ' - ' . $account->name,
                'state' => [
                    'opened' => true
                ],
                'data' => [
                    'nature' => $account->nature,
                    'balance' => $account->balance
                ]
            ];
        }

        return response()->json($treeData);
    }



}
