<div class="row">
  @foreach($courses as $course)
    <div class="col-sm-12 col-md-3 col-xs-3">
      <div class="thumbnail" style="height:345px;">
        <div style="height:140px; display: block; width:100%;overflow:hidden;">
          <img src="../image/{{$course->src}}" style="max-width:100%;" alt="...">
        </div>

          <div class="caption">
            <h3 style="max-height: 50px; overflow: hidden;">{{$course->name}}</h3>
              <p style="overflow:hidden;  display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; text-overflow: ellipsis;">{{$course->about}}</p>
              <p style="position: absolute; bottom: 25px;"><a href="course/{{$course->id}}" class="btn btn-primary btn-success" role="button">Learn</a></p>
          </div>
      </div>
    </div>
    @endforeach
</div>
