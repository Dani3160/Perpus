@foreach($cerpen as $c)
Judul : {{$c->cerpen_judul}}
Karya : {{$c->cerpen_karya}}
Pengirim: {{$c->name}}
<a href="">Baca</a>
@endforeach