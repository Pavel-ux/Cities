<label for="">Статус</label>
<select class="form-control" name="published">
   @if (isset($article->id))
      <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
      <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
   @else
       <option value="0">Не опубликовано</option>
       <option value="1">Опубликовано</option>
   @endif
</select>

<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок " value="{{$article->title ?? ""}}" required>

<label for="">Slug (Уникальное значение)</label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug ?? ""}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
   <option value="0">-- без родительской категории --</option>
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short ?? ""}}</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">{{$article->description ?? ""}}</textarea>

<hr />

<style>
	#map {width:100%; height:500px;}
</style>

<div id="map"></div>

<script>
	function initMap() {
		var element = document.getElementById('map');
		var options = {
			zoom: 13,
			center: {lat: 47.0960417, lng: 37.5590331},
		};

		var myMap = new google.maps.Map(element, options);

		var markers = [
			{
				coordinates: {lat: 47.0960417, lng: 37.5590331}
      }
		];

		for(var i = 0; i < markers.length; i++) {
			addMarker(markers[i]);
		}

		function addMarker(properties) {
			var marker = new google.maps.Marker({
				position: properties.coordinates,
				map: myMap
			});

			if(properties.image) {
				marker.setIcon(properties.image);
			}

			if(properties.info) {
				var InfoWindow = new google.maps.InfoWindow({
					content: properties.info
				});

				marker.addListener('click', function(){
					InfoWindow.open(myMap, marker);
				});
			}
		}
	}
</script>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
