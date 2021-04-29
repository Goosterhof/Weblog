
<style media="screen">
.author-box-intro {
margin-top: 15px;
}
a.author-social-link.small {
margin-left: 5px;
}
.mt-5 .pr-1{
	padding-left:12px;
}
</style>
<section class="author-box container border-start">
	<div class="panel panel-default">
   <div class="panel-body">
	<div class="row">
			<div class="col-xs-12">
				<!-- <hr class="visible-xs-block"> -->
				<div class="author-box-intro small text-muted">About the Author</div>
				<!-- .author-box-intro -->
				<div class="author-inline-block">
				<h4 class="author-box-title">
					@forelse ($user as $key)
					<span class="author-name text-primary">{{$key->name}}</span>
					</h4>
				</div>
				<div class="author-box-content">{{$key->name}} {{$key->bio}}
				</div><!-- author-box-content -->
			</div><!-- col -->
		</div><!-- row -->
		</div><!-- panel-body -->
	</div><!-- panel -->
	@empty
	@endforelse
<div class="col-xs-12 mt-5">
	<h6>Other Articles by {{$key->name}}</h6>
		<ul class="pr-1">
			<li class="list-group">
				@foreach ($user_post as $key)
					<a class="link-secondary" href="{{route('post.show', $key->id)}}">{{ $key->title }}</a>
					@endforeach
			</li>
		</ul>
</div>
<div class="col-xs-12 mt-5">
	<h6>Categories</h6>
		<ul class="pr-1">
			<li class="list-group">
				@foreach ($post->categories as $key)
					<a class="link-secondary" href="{{ route('category.show', ['id' => $key->id] ) }}">{{ $key->name }}</a>
				@endforeach
			</li>
		</ul>
	</div>


</section><!-- author-box -->
