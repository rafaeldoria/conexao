<div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">
    @foreach ($imagesInstagram as $image)
    <div class="instagram_gallery_item">
        <img src="{{Storage::url('images/instagram/'.$image->img_instagram)}}" alt="">
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="{{$image->link_instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Siga-nos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>