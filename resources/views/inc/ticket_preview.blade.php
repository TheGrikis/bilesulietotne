<div class="col-12 col-sm-12 col-md-6 col-xl-4">
  <div class="card text-white bg-dark mb-3">
    <img class="card-img-top" src="{{ asset( $tick->events->images()['asset_path'].$tick->events->images()['image_small'] ) }}" alt="Card image cap">
        <div class="card-img-overlay">
          <div class="row">
              <div class="col-12 col-sm-6">
                  <h5 class="text-uppercase"><strong class="info-text">{{$tick->events->places->name}}</strong></h5>
              </div>
              <div class="col-12 col-sm-6 text-right">
                  <h5 class="text-uppercase">
                      <div class="row">
                        <div class="col-6 col-sm-12 text-left text-sm-right">
                          <strong class="info-text">{{date('d/m/Y', strtotime($tick->events->date))}}</strong>
                        </div>
                        <div class="col-6 col-sm-12 text-right">
                          <strong class="info-text">{{date('h:t', strtotime($tick->events->date))}}</strong>
                        </div>
                      </div>


                  </h5>
              </div>
          </div>


          <div class="row ticket-info align-items-center">
            <div class="col-12">
                <br>
            </div>
          <div class="col-12 col-sm-4 text-sm-center text-md-left align-self-end">
              <h5 class="text-uppercase">
                <div class="row  text-nowrap">
                  <div class="col-6 col-sm-12 text-right text-sm-left">
                    <p class="info-text">@if($tick->sector) Sektors @endif</p>
                  </div>
                  <div class="w-100 d-none d-sm-block"></div>
                  <div class="col-6 col-sm-12 text-left">
                    <strong class="info-text">{{ $tick->sector }}</strong>
                  </div>
                </div>
              </h5>
          </div>
          <div class="col-12 col-sm-4 text-sm-center text-md-middle">
              <h5 class="text-uppercase">
                <div class="row">
                  <div class="col-6 col-sm-12 text-right text-sm-center">
                    <p class="info-text">@if($tick->row) Rinda @endif</p>
                  </div>
                  <div class="w-100 d-none d-sm-block"></div>
                  <div class="col-6 col-sm-12 text-left text-sm-center">
                    <strong class="info-text">{{ $tick->row }}</strong>
                  </div>
                </div>
              </h5>
          </div>
          <div class="col-12 col-sm-4 text-sm-center text-md-right">
            <h5 class="text-uppercase">
              <div class="row">
                <div class="col-6 col-sm-12 text-right">
                  <p class="info-text">@if($tick->seat) Vieta @endif</p>
                </div>
                <div class="w-100 d-none d-sm-block"></div>
                <div class="col-6 col-sm-12 text-left text-sm-right">
                  <strong class="info-text">{{ $tick->seat }}</strong>
                </div>
              </div>
            </h5>
          </div>
      </div>
    </div>
    <div class="card-body">
            <h5 class="card-title text-center"><strong>{{ $tick->events->name }}</strong></h5>
      <p class="card-text">{{ $tick->events->description }}</p>
    </div>
    <div class="card-footer">
      <p class="card-text"><small class="text-muted">Last updated {{ date('h:t d.m.y', strtotime($tick->updated_at)) }}</small></p>
    </div>
  </div>
</div>
