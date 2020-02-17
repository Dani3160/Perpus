@foreach($novel as $n)
Judul : {{$n->novel_judul}}
Karya : {{$n->novel_karya}}
Pengirim: {{$n->name}}
<a href="">Baca</a>
@endforeach