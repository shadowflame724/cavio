<a href="{{ route('admin.collection.edit', array('collection' => $collection->id))}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
@if($collection->banner == 1)
    <a href="{{ route('admin.collection.marker.edit', array('collection' => $collection->id)) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Marker\'s editor"></i></a>
@endif
