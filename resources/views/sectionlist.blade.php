@foreach($sections as $section)
@if($section->status)
<div class="col-xs-10 col-md-offset-1">
  <div class="panel panel-default">
      <div class="panel-heading">
        @if(count($section->section)>0)
        Section
        @endif
        @if($section->video!=null)
        <i class="fa fa-video-camera" aria-hidden="true"></i> Video<a href="/learning/public/course/learn/{{$courseId}}/video/{{$section->video->id}}">
        @elseif($section->content!=null)
        Content<a href="/learning/public/course/learn/{{$courseId}}/article/{{$section->content->id}}">
        @endif
        <h3 class="panel-title">{{$section->title}}</h3>
        @if($section->video!=null||$section->content!=null)
        </a>
        @endif
      </div>
      @if(count($section->section)>0)
      <div class="panel-body">
        @foreach($section->section as $sec)
                @if($sec->status)
                <div>
                <a href="
                @if(count($sec->section)>0) /learning/public/course/learn/{{'section'}}/{{$sec->id}}
                @elseif (count($sec->video)!=null) /learning/public/course/learn/{{$courseId}}/video/{{$sec->video->id}}
                @elseif (count($sec->content)!=null)/learning/public/course/learn/{{$courseId}}/{{'article'}}/{{$sec->content->id}}
                @endif"><span class="
                  @if(count($sec->section)>0) {{'fa-plus-square-o'}}
                  @elseif (count($sec->video)!=null) {{'fa fa-video-camera'}}
                  @elseif (count($sec->content)!=null) {{'fa fa-pencil-square-o'}}
                  @endif
                " aria-hidden="true"></span> {{$sec->title}}</a></div>
                @endif
        @endforeach
      </div>
      @endif
  </div>
</div>
@endif
@endforeach
