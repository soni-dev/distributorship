<?php

namespace App\Repository\Admin;
use App\Interfaces\Admin\DashboardInterface;
use App\Models\User;
use App\Models\Franchise;
use App\Models\Distributor;
use App\Models\Sale;
use Carbon\Carbon;

class DashboardRepository implements DashboardInterface
{
    public function dashboard() {
       $userCount = User::count('*');
       $salesCount = Sale::count('*');
       $franCount = Franchise::count('*');
       $distCount = Distributor::count('*');
       //today count
       $date  = Carbon::now()->format('Y-m-d');
       $distTCount = Distributor::whereDate('created_at', $date)->count('created_at');
       $franTCount = Franchise::whereDate('created_at', $date)->count('created_at');
       $saleTCount = Sale::whereDate('created_at', $date)->count('created_at');
       //yesterday
       $yesterday  = Carbon::yesterday()->format('Y-m-d');
       $distYCount = Distributor::whereDate('created_at', $date)->count('created_at');
       $franYCount = Franchise::whereDate('created_at', $date)->count('created_at');
       $saleYCount = Sale::whereDate('created_at', $date)->count('created_at');


       $dists     = Distributor::latest()->take(5)->orderBy("created_at","desc")->get();
       return ['distTCount'=>$distTCount,'distYCount'=>$distYCount,'user'=>$userCount,'sale'=>$salesCount,'fran'=>$franCount,'dist'=>$distCount,'dists'=>$dists,'franTCount'=>$franTCount,'saleTCount'=>$saleTCount,'franYCount'=>$franYCount,'saleYCount'=>$saleYCount];
 
    }
    
}
?>