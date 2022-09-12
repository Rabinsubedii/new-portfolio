@extends('layouts.app1', ['activePage' => 'role-assignment', 'titlePage' => __('Role Assignmnet')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      
      @can('assign_roles')
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/roleassign/{{$role->id}}" class="form-horizontal">
             
            @csrf
           

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Assign Permission To {{$role->name}}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Permissions') }}</label>
                  <div class="col-sm-7">
                  @foreach($permissions as $perm)
                    <div class="form-group">
                      
                    <input class="form-check-input" type="checkbox" value="{{$perm->id}}" id="flexCheckChecked" name='permission[]' 
                   @foreach($permission_to_role as $role_per)
                      @if($perm->name==$role_per->name)
                        checked
                      @endif
                   @endforeach
                    >
                    
                    <label class="form-check-label" for="flexCheckChecked">
                      {{$perm->name}}
                    </label>
                   
                      <!-- @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif -->
                    </div>
                    @endforeach
                  </div>
                  
                </div>
                
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Assign Permission') }}</button>
              </div>
            </div>
            
    </div>
    @endcan
  </div>
@endsection