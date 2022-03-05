<!DOCTYPE html>
<html lang="en">
<body>
    @if ($berita->count())
        @auth
            <div class="row">
                @foreach ($berita as $value)
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('detail_berita', $value->id) }}">{{ $value->judul }}</a>
                                </h4>
                                <p class="card-text " >
                                    @if(strlen($value->isi) > 50)
                                        {!! substr($value->isi,0,50) !!}. . .
                                    @else
                                        {!! $value->isi !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</small></span>
                            <a href="{{ route('detail_berita', $value->id) }}" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            @if ($isempty == "yes")
                <div class="d-flex justify-content-center">
                    {!! $berita->links() !!}
                </div>
            @endif
        @else
            <div class="row">
                @foreach ($berita as $value)
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="meta-tags">
                                    <span class="date">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</span>
                                </div>
                                <h3>
                                    <a href="{{ route('detail_berita', $value->id) }}" style="font-size: 20px">{{ $value->judul }}</a>
                                </h3>
                                <p>
                                    @if(strlen($value->isi) > 100)
                                        {!! substr($value->isi,0,100) !!}. . .
                                    @else
                                        {!! $value->isi !!}
                                    @endif
                                </p>
                                <a href="{{ route('detail_berita', $value->id) }}" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            @if ($isempty == "yes")
                <div class="d-flex justify-content-center">
                    {!! $berita->links() !!}
                </div>
            @endif
        @endauth
    @else
        <p class="text-danger" style="display: block; margin-left: auto; margin-right: auto">Berita tidak ditemukan.</p>
    @endif
</body>
</html>