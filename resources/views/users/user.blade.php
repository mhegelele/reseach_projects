@extends('layout.new')
@section('content')
 <section id="contentSection">
    <div class="row wow fadeInDown">
<div class="line" style=" margin-left: 1%">        
    <h5 class="text-white margin-top-bottom-40 text-size-60 text-line-height-1">
 <a href="{{ url('home')}}">Home </a>&nbsp;&nbsp; /&nbsp;&nbsp;<a href="{{url('manage')}}" >Manage</a>
&nbsp;&nbsp; /&nbsp;&nbsp;<a href="" style="color:#2F76A5;">Users</a></h5>
  </div>
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Manage Research Project Users</span></h2>
            <div class="">


  
<div class="citation">
<table class="table table-striped">
	 <tr>

            <form method="POST" action="{{url('manage/user')}}">
                        @csrf
<td><input class="form-control" placeholder="Username" type="text" name="username" id="volume" required></td>
<td><select class="form-control" type="text" name="name" required>
                                <option value="" selected disabled >Choose center</option>
                                <option value="Amani">NIMR Amani</option>
                                <option value="Mwanza">NIMR Mwanza</option>
                                <option value="Headquarters">NIMR Headquarters</option>
                                <option value="Tanga">NIMR Tanga</option>
                                <option value="Mbeya">NIMR Mbeya</option>
                                <option value="Muhimbili">NIMR Muhimbili</option>
                                <option value="Ngongongare">NIMR Ngongongare</option>
                                <option value="Tukuyu">NIMR Tukuyu</option>
                                <option value="Tabora">NIMR Tabora</option>
                            </select>
</td>
<td colspan="2"><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"></td>
<td ><input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password"></td>
<td><button class="btn btn-primary" type="submit">Add User</button> </td>
  </form>
  </tr>
	<tr>

<th>Centre</th>
<th colspan="2">Username</th>
<th>Role</th>
<th colspan="2">Action</th>
</tr>
@foreach($proje as $key => $f)
<tr>
	<td>{{ ++$key }}&nbsp;&nbsp;NIMR-{{$f->name}}</td>
	<td colspan="2">{{$f->username}}</td>
	<td>{{$f->level}} </td>

     <td colspan="2">
                    <a class="btn btn-primary fa fa-edit" href="{{url('/manage/useredit/'.$f->id)}}"></a>
                       
      <a href="{{url('/manage/deleteuser/'.$f->id)}}" class="btn btn-danger fa fa-trash-o"></a>
                              
     </td>
</tr>
	@endforeach	
</table>
</div>


<div>{{$proje->links()}}</div>


              
            </div>
          </div>
          
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
        
        
          <div class="single_sidebar">
           <h2><span>Research Projects</span></h2>
                 <ul class="centers">
                  @foreach($ppending as $s)
                  <li class="centers"><a href="{{url('manage/progress')}}">Progress Research Project
                  <span class="badge"> {{$s->progress}}</span></a></li>@endforeach
                     @foreach($papproved as $s)
                   <li class="centers"><a href="{{url('manage')}}">Complete Research Project <span class="badge" style="background color=#2F76A5;"> {{$s->approved}}</span></a></li>
                   @endforeach
                      <li class="centers"><a href="{{url('manage/users')}}">
                      Users</a></li>
                   <li class="centers"><a href="{{url('manage/report')}}">Report</a></li>
           </ul>
          </div>
          
          <div>
     
    
  </section>
  @endsection