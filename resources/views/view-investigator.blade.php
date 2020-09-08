@extends('layout.new')
@section('content')
 
 
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInDown">
   <div class="single_sidebar wow fadeInDown" style="margin-bottom: 2px;">
<h2 style="text-transform: uppercase;"> <span>Update investigator </span></h2>
 <div class="col-md-10 col-md-offset-1">
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissable fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong> {{session('success')}}</strong>
      </div>
    @endif
  </div>
</div>
<table class="table">
 
    <form method="POST" action="{{url('investigators')}}">
    {{csrf_field()}}
   
<tr> <td colspan="2"><input type="text" name="fname" value="{{$pubs->fname}}" class="form-control" placeholder="Firstname"> </td></tr>
    <tr> <td colspan="2"><input type="text" name="lname" value="{{$pubs->lname}}" class="form-control" placeholder="Middlename"></td></tr>
<tr><td colspan="2"><input type="text" name="sname" value="{{$pubs->sname}}" class="form-control" placeholder="Surname"></td></tr> 
<tr><td colspan="2"><input type="text" name="role" value="{{$pubs->role}}" class="form-control" placeholder="Investigator"></td></tr>
  <tr> <td><input type="hidden" name="id" value=" {{$pubs->i_id}}">
             <input type="submit" class="btn  btn-primary btn-block "  value="Update"  {{session()->has('success')? 'disabled':''}}/></td>
             </form>
              <form method="POST" action="{{url('delete-investigator')}}">
    {{csrf_field()}}
             <td><input type="hidden" name="id" value=" {{$pubs->i_id}}">
             <input type="submit" class="btn  btn-danger btn-block "  value="Delete"  {{session()->has('success')? 'disabled':''}}/></td></tr>

</form>
    </table>

      </div>
        <div class="col-lg-4 col-md-4 col-sm-4 wow fadeInDown">
        <aside class="right_content">
        
                <div class="single_sidebar">
           <h2><span>Research Project</span></h2>
              @foreach($c as $f)

  <a href="{{url('/uploaded-project/project/'.$f->pro_id)}}">
<div class="citation">
  {{$f->title}} </strong><br>
</div>
</a>
@endforeach

<div>{{$c->links()}}</div>   
          </div>
          
          <div>     
     
        </div>
  </section>
  @endsection