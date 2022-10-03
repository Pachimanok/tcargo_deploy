@extends('layouts.modal')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h3>
          {{__('vehicle.vehicle_info')}}
      </h3>       
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>
        <b>{{__('vehicle.type')}}</b>
        <br>{{$vehicle_types[$vehicle->type]}}
      </p>
    </div>
    <div class="col">
      <p>
        <b>{{__('vehicle.brand')}}</b>
        <br>{{$vehicle->brand}}
      </p>
    </div>
    <div class="col">
      <p>
        <b>{{__('vehicle.model')}}</b>
        <br>{{$vehicle->model}}
      </p>      
    </div>
    <div class="col">
      <p>
        <b>{{__('vehicle.plate')}}</b>
        <br>{{$vehicle->plate}}
      </p>  
    </div>
    <div class="col">    
      <p>
        <b>{{__('vehicle.satellite_tracking')}}</b>
        <br>
        @if($vehicle->satellite_tracking)
          {{__('messages.yes')}}
        @else
          {{__('messages.no')}} 
        @endif
      </p> 
    </div>    
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12">
      <h4>
          {{__('vehicle.vehicle_load_classes')}}
      </h4>       
    </div>
  </div>
  <div class="row">
    @foreach($load_classes as $load_class)
      <div class="col-3">
        <p>
          <b>{{$load_class->name}}</b>
          <br>
          @if(in_array($load_class->id, $vehicle->vehicle_load_classes)) 
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
          {{__('vehicle.documents')}}
      </h4>       
    </div>
  </div>  
  <div class="row">
    <div class="col-3">
      <h5>{{__('vehicle.plate_slip')}}</h5>
      @if($vehicle->plate_slip_image_path)
        <a href="/storage/{{$vehicle->plate_slip_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->plate_slip_image_path}}">
        </a>
      @endif
    </div>
    <div class="col-3">
      <!-- RUTA -->
      <h5>{{__('vehicle.registration')}}</h5>
      {{__('vehicle.expiration_date')}}: {{\Carbon\Carbon::parse($vehicle->registration_expiration_date)->format('d/m/Y')}}
      @if($vehicle->registration_image_path)
        <a href="/storage/{{$vehicle->registration_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->registration_image_path}}">
        </a>
      @endif
      
    </div>
    <div class="col-3">
      <!-- SEGURO OBLIGATORIO -->
      <h5>{{__('vehicle.insurance')}}</h5>
      {{__('vehicle.expiration_date')}}: {{\Carbon\Carbon::parse($vehicle->insurance_expiration_date)->format('d/m/Y')}}
      @if($vehicle->insurance_image_path)
        <a href="/storage/{{$vehicle->insurance_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->insurance_image_path}}">
        </a>
      @endif
    </div>    
    <div class="col-3">
      <!-- REVISION TECNICA -->
      <h5>{{__('vehicle.technical_review')}}</h5>
      {{__('vehicle.expiration_date')}}: {{\Carbon\Carbon::parse($vehicle->technical_review_expiration_date)->format('d/m/Y')}}
      @if($vehicle->technical_review_image_path)
        <a href="/storage/{{$vehicle->technical_review_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->technical_review_image_path}}">
        </a>
      @endif
    </div>        
  </div>

  <hr/>

  <!-- TRAILER -->
  <div class="row mt-5">
    <div class="col-sm-12">
      <h3>
        {{__('vehicle.trailer_info')}}
      </h3>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>
        <b>{{__('vehicle.trailer_type')}}</b>
        <br>{{$trailer_types[$vehicle->trailer_type]}}
      </p>
    </div>
    <div class="col">
      <p>
        <b>{{__('vehicle.trailer_plate')}}</b>
        <br>{{$vehicle->trailer_plate}}
      </p>
    </div>
  </div>

<hr/>
  <!-- DOCUMENTOS DEL TRAILER-->
  <div class="row">
    <div class="col-sm-12">
      <h4>
          {{__('vehicle.trailer_documents')}}
      </h4>       
    </div>
  </div>  
  <div class="row">
    <div class="col">
      <h5>{{__('vehicle.trailer_plate_slip')}}</h5>
      @if($vehicle->trailer_plate_slip_image_path)
      <a href="/storage/{{$vehicle->trailer_plate_slip_image_path}}" target="_blank">
        <img class="img-fluid" src="/storage/{{$vehicle->trailer_plate_slip_image_path}}">
      </a>
      @endif
    </div>
    <div class="col">
      <!-- SEGURO OBLIGATORIO DEL TRAILER -->
      <h5>{{__('vehicle.trailer_insurance')}}</h5>
      {{__('vehicle.expiration_date')}}: {{\Carbon\Carbon::parse($vehicle->trailer_insurance_expiration_date)->format('d/m/Y')}}
      @if($vehicle->trailer_insurance_image_path)
        <a href="/storage/{{$vehicle->trailer_insurance_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->trailer_insurance_image_path}}">
        </a>      
      @endif
    </div>
    <div class="col">
      <!-- REVISION TECNICA DEL TRAILER -->
      <h5>{{__('vehicle.trailer_technical_review')}}</h5>
      {{__('vehicle.expiration_date')}}: {{\Carbon\Carbon::parse($vehicle->trailer_technical_review_expiration_date)->format('d/m/Y')}}      
      @if($vehicle->trailer_technical_review_image_path)
        <a href="/storage/{{$vehicle->trailer_technical_review_image_path}}" target="_blank">
          <img class="img-fluid" src="/storage/{{$vehicle->trailer_technical_review_image_path}}">
        </a>
      @endif
    </div>
  </div>  



<!--
  <pre>
    {{print_r($vehicle)}}
  </pre>
-->


@endsection

