@extends('layouts.main')
@section('content')
<div class="col-xl-12 order-xl-1">
   <div class="card">
      <div class="card-header">
         <div class="row align-items-center">
            <div class="col-8">
               <h3 class="mb-0">
                @if($status) Edit @else Add @endif Reason Status
            </h3>
            </div>
            <div class="col-4 text-right actions">
                <a href="{{ route('status.index') }}" class="btn btn-sm btn-default"> View Statuses</a>
            </div>
         </div>
      </div>
      <div class="card-body">
         @include('admin.status.partials.form')
      </div>
   </div>
</div>
@endsection
