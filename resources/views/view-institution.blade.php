@extends('layout.new')
@section('content')
 
 
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 wow fadeInDown">
   <div class="single_sidebar wow fadeInDown" style="margin-bottom: 2px;">
<h2 style="text-transform: uppercase;"> <span>Update Institution </span></h2>
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
 
    <form method="POST" action="{{url('institutions')}}">
    {{csrf_field()}}
   
<tr> <td colspan="2">
 <textarea rows="5" cols="20" class="form-control" name="inst_name">{{$pubs->inst_name}}</textarea>
  </td></tr>
      <tr> <td><input type="hidden" name="id" value=" {{$pubs->id}}">
             <input type="submit" class="btn  btn-primary btn-block "  value="Update"/></td>
             </form>
             </tr>

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