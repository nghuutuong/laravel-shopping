@section('content2')
@extends('layoutfp')
<div class="container">
                <h2 class="title text-center">Liên hệ với chúng tôi</h2>
    <div class=row>
        <div class="col-md-12">
            <div class="features_items"><!--features_items-->
                <div class="row"> 
                @foreach($contact as $key => $contact)
                    <div class="col-md-8">
                    {!!$contact->contact_info!!} <br>
                    {!!$contact->contact_fanpage!!}       
                    </div>
                    <div class="col-md-4">
                        <h4>Bản đồ</h4>
                    {!!$contact->contact_map!!}
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8402274282776!2d106.69142151744384!3d10.82353630000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528f1f95cf5cb%3A0xf9e7b4f2adbd6adb!2zRW1hcnQgR8OyIFbhuqVw!5e0!3m2!1svi!2s!4v1605094385137!5m2!1svi!2s" 
                        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection