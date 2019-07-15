<div class="pad">
  <div class="col-12">

    <div class="box card-inverse bg-img" style="background-image: url({{asset('bg-1.jpg')}}); padding-top: 200px">
            <div class="flexbox align-items-center px-20" data-overlay="4">
              <div class="flexbox align-items-center mr-auto">
                <a href="#">
                  @if ($klien->avatar==null)
<img class="avatar avatar-xl avatar-bordered" src="{{(asset('user.png'))}}" alt="">
                  @else
<img class="avatar avatar-xl avatar-bordered" src="{{(asset('storage/avatars'))}}/{{$klien->avatar}}" alt="">
                  @endif

                </a>
                <div class="pl-10 d-none d-md-block">
                  <h5 class="mb-0"><a class="hover-primary text-white" href="#">{{$klien->nama_lengkap}}</a></h5>
                  <span>{{$klien->nama_jenis_user}}</span>
                </div>
              </div>

              <ul class="flexbox flex-justified text-center py-20">
                <li class="px-10">
                  <span class="opacity-60">Project</span><br>
                  <span class="font-size-20">{{$total_project}}</span>
                </li>

              </ul>
            </div>
          </div>
          <div class="box">
            <div class="box-body box-profile">
              <div class="row">
              	<div class="col-md-4 col-12">
              		<div class="profile-user-info">
						<p>Email :<span class="text-gray pl-10"><address>
              {{$klien->email}}
            </address></span> </p>
						<p>Telpon :<span class="text-gray pl-10">{{$klien->telpon}}</span></p
            <p>Tanggal Lahir :<span class="text-gray pl-10">{{tgl_indo($klien->tgl_lahir)}}</span></p>
            <p>Umur :<span class="text-gray pl-10">{{$diff}} {{\Terbilang::convert($diff)}} Tahun</span></p>
            <p>Nomor Identitas  :<span class="text-gray pl-10">{{$klien->jenis_identitas}}-{{$klien->no_identitas}}</span></p>
						<p>Alamat Rumah :<span class="text-gray pl-10"><address>{{$klien->alamat_rumah}}</address></span></p>
            <p>Alamat Kantor :<span class="text-gray pl-10"><address>{{$klien->alamat_kantor}}</address></span></p>
					</div>
             	</div>
              	<div class="col-md-3 col-12">
              		<div class="profile-user-info">

						<div class="user-social-acount">
							<p>Provinsi :<span class="text-gray pl-10"><address>{{$klien1->prov}}</address></span></p>
							<p>Kota / Kab :<span class="text-gray pl-10"><address>{{$klien1->kab}}</address></span></p>
							<p>Kecamatan :<span class="text-gray pl-10"><address>{{$klien1->kec}}</address></span></p>
							<p>Kelurahan :<span class="text-gray pl-10"><address>{{$klien1->kel}}</address></span></p>

						</div>
					</div>
             	</div>
              	<div class="col-md-5 col-12">
              		<div class="profile-user-info">
						<div class="map-responsive">
							<iframe src="https://maps.google.com/maps?q='{{$klien1->kab}}'&t=&z=13&ie=UTF8&iwloc=&output=embed&client=google-maps-embed"  width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
             	</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</div>

{{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=bandung&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63445.76486791393!2d108.29465014351075!3d-6.347369624055237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb951a07812b7%3A0x9f2e03cfbf1b0b2f!2sIndramayu%2C+Kec.+Indramayu%2C+Kabupaten+Indramayu%2C+Jawa+Barat%2C+Indonesia!5e0!3m2!1sid!2sus!4v1560320694540!5m2!1sid!2sus" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --}}

{{-- https://www.google.com/maps/vt?pb=!1m4!1m3!1i12!2i3279!3i2119!1m4!1m3!1i12!2i3279!3i2120!1m4!1m3!1i12!2i3279!3i2121!1m4!1m3!1i12!2i3280!3i2119!1m4!1m3!1i12!2i3281!3i2119!1m4!1m3!1i12!2i3280!3i2120!1m4!1m3!1i12!2i3280!3i2121!1m4!1m3!1i12!2i3281!3i2120!1m4!1m3!1i12!2i3281!3i2121!2m3!1e0!2sm!3i469179180!2m34!1e2!2sspotlight!4m2!1sgid!2seLh5hTheMeni3QvOsOh0IQ!5i1!8m27!1m2!12m1!20e1!2m7!1s0x2e6eb951a07812b7%3A0x9f2e03cfbf1b0b2f!2sIndramayu%2C+Kec.+Indramayu%2C+Kabupaten+Indramayu%2C+Jawa+Barat%2C+Indonesia!4m2!3d-6.3488982!4d108.3287361!5e1!6b1!11e11!13m11!2shh%2Chplexp%2Ca!14b1!18m4!5b0!6b0!9b1!12b1!22m3!6e2!7e3!8e2!19u14!19u29!19u50!3m9!2sid!3sUS!5e289!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e3!12m1!5b1&client=google-maps-embed&token=67152 --}}
