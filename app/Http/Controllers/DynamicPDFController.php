<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User;
use Auth;

use Session;
class DynamicPDFController extends Controller
{
  public function __construct() {
    $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
  }

    function index()
    {
     $user_data = User::all(); 
     //print_r($user_data);exit;
     //$user_data = $this->get_user_data();
     return view('dynamic_pdf')->with('users', $user_data);
    }

    function get_user_data()
    {
     $user_data = DB::table('users')
         ->limit(10)
         ->get();
     return $user_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_user_data_to_html());
     return $pdf->stream();
    }

    function convert_user_data_to_html()
    {
     $user_data = User::all(); 
     //$user_data = $this->get_user_data();
     $output = '
     <h3 align="center">Users Report</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Email</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Phone</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">State</th>
    
   </tr>
     ';  
     foreach($user_data as $user)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$user->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->phone.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->city.'</td>
       <td style="border: 1px solid; padding:12px;">'.$user->state.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}