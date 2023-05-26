<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Job_Details;
use App\Models\Apply_job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{   //home page
    public function home()
    { 
        return view('home');
    }
    //Add Jobs View
    public function view_job_add()
    {  
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

        $data = DB::table('job_details')->get();
        return view('job_add',compact('data'));
    }
    //Job submit admin function
    public function submit_job(Request $request)
    {
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

        $request->validate([
            'salary' => 'required|integer',
        ]);

        $save = new Job_Details([
            'title' => $request->title,
            'faculty'=> $request->faculty,
            'description'=> $request->description,
            'location'=> $request->location,
            'salary'=>$request->salary,
            'deadline'=> $request->deadline,
            ]);
        $save->save();
        return redirect()->back()->with('success', 'Job Added Successfully.');
    }
    //Job delete admin 
    public function delete_job($id)
    {
       
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

        $data = DB::table('apply_job')->where('job_id',$id)->get();
        try{
            foreach($data as $key => $items)
            {
                unlink("uploads/".  $items->cv);
            }
        }
        catch(Expection)
        {
        }

        DB::delete('delete from apply_job where id = ?',[$id]);
        DB::delete('delete from job_details where id = ?',[$id]);

        return redirect()->back()->with('delete', 'Job Delete Successfully.');
    }
    //Job view User 
    public function view_jobs_view()
    {  
        $data = DB::table('job_details')->orderBy('id', 'desc')->paginate(6);
        return view('jobs_view',compact('data'));
    }
    //Job apply view 
    public function view_job_submit($id)
    {
        $data = DB::table('job_details')->where('id',$id)->first();
        return view('job_submit',compact('data'));
    }
    //Job apply user function
    public function apply_job(Request $request,$id)
    {

       
        $request->validate([
            'link' => 'required|file|max:500000|mimes:pdf,',
        ]);
      
      
        $filename = now()->getTimestampMs().$request->link->getClientOriginalName();
        $request->link->move(public_path().'/uploads/', $filename);
        
        $save = new Apply_job([
            'name' => $request->name,
            'email'=> $request->email,
            'telephone'=> $request->telephone,
            'cv'=>$filename,
            'job_id'=> $id,
            ]);
        $save->save();

        return redirect()->back()->with('success', 'Job Submit Successfully.');
    }
    //apply Job view
    public function view_apply_job()
    {  
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

        $data = DB::table('apply_job')->join('job_details', 'apply_job.job_id' , 'job_details.id')->select('apply_job.id as Aid', 'apply_job.*','job_details.*')->get();   
        return view('apply_job_view',compact('data'));
    }

    //download_dock
    public function download_dock($id)
    {   
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

     try{
        $data = DB::table('apply_job')->where('id',$id)->get();
            foreach ($data as $key => $item)
            {
                $filepath = public_path('uploads/')."$item->cv";
                return Response::download($filepath);
            }
        }
        catch(Expection)
        {
            return redirect()->back()->with('delete', 'Something Wrong.');
        }
    }

    //Job pdf and data delete
    public function delete_apply_job($id)
    {
        if( Auth::user()->role == 1 )
        {
            return redirect('login');
        }

        $data = DB::table('apply_job')->where('id',$id)->get();
            try{
                foreach($data as $key => $items)
                {
                    unlink("uploads/".  $items->cv);
                }
            }
            catch(Expection)
            {
            }
        DB::delete('delete from apply_job where id = ?',[$id]);
        return redirect()->back()->with('delete', 'Data Delete Successfully.');
    }

    //change_user_details

    public function change_user_details()
    { 
        return view('change_user_details');
    }
   //changePassword
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
      
        return redirect()
        ->back()
        ->with('success', 'Password Changed Successfully.');      
    }

   // changename
    public function changename(Request $request)
    {
        $request->validate([

            'name' => ['required'],
         
        ]);
   
        User::find(auth()->user()->id)->update(['name'=>$request->name]);
      
        return redirect()
        ->back()
        ->with('success', 'Name Changed Successfully.');      
    }
}
