@extends('layouts.modal')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h3>
          {{__('driver.driver')}}
      </h3>       
    </div>
  </div>
  <div class="row">

    <div class="col-3">
      <p>
        <b>{{__('driver.name')}}</b>
        <br>{{$driver->name}}
      </p>
    </div>
    <div class="col-3">
      <p>
        <b>{{__('driver.birth_date')}}</b>
        <br>{{\Carbon\Carbon::parse($driver->birth_date)->format('d/m/Y')}}
      </p>      
    </div>
    <div class="col-3">
      <p>
        <b>{{__('driver.fiscal_id_number')}}</b>
        <br>{{$driver->fiscal_id_number}}
      </p>  
    </div>
    <div class="col-3">
      <p>
        <b>{{__('driver.professional_id_number')}}</b>
        <br>{{$driver->professional_id_number}}
      </p>  
    </div>
    <div class="col-6">
      <p>
        <b>{{__('driver.email')}}</b>
        <br>{{$driver->email}}
      </p>  
    </div>
    <div class="col-6">
      <p>
        <b>{{__('driver.phone_number')}}</b>
        <br>{{$driver->phone_number_area_code}} {{$driver->phone_number}}
      </p>  
    </div>
   
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <h4>
          {{__('driver.driver_load_classes')}}
      </h4>       
    </div>
  </div>
  <div class="row">
    @foreach($load_classes as $load_class)
      <div class="col-3">
        <p>
          <b>{{$load_class->name}}</b>
          <br>
          @if(in_array($load_class->id, $driver->driver_load_classes)) 
          {{__('messages.yes')}} 
          @else 
          {{__('messages.no')}} 
          @endif
        </p>
      </div>    
    @endforeach
  </div>
  <hr/>
  <div class="row">
    <div class="col-sm-12">
      <h4>
          {{__('driver.documents')}}
      </h4>       
    </div>
  </div>  
  <div class="row">
    <div class="col-3">
      <h5>{{__('driver.license')}}</h5>
      @if($driver->license_image_path)
        <a href="/storage/{{$driver->license_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$driver->license_image_path}}">
        </a>
      @endif
    </div>
      
    <div class="col-3">
      <h5>{{__('driver.medical_license')}}</h5>
      @if($driver->medical_license_image_path)
        <a href="/storage/{{$driver->medical_license_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$driver->medical_license_image_path}}">
        </a>
      @endif
    </div>

    <div class="col-3">
      <h5>{{__('driver.special_license')}}</h5>
      @if($driver->special_license_image_path)
        <a href="/storage/{{$driver->special_license_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$driver->special_license_image_path}}">
        </a>
      @endif
    </div>    

    <div class="col-3">
      <h5>{{__('driver.health_license')}}</h5>
      @if($driver->health_license_image_path)
        <a href="/storage/{{$driver->health_license_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$driver->health_license_image_path}}">
        </a>
      @endif
    </div>        

  </div>
 


@endsection

