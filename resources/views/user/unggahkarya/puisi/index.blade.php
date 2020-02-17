@foreach($puisi as $p)
Judul : {{$p->puisi_judul}}
Karya : {{$p->puisi_karya}}
Pengirim: {{$p->name}}
<a href="">Baca</a>
@endforeach