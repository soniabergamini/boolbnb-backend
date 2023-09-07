
@extends('layouts.admin')
@section('content')

<div class="containerDash">

  <div class="row mt-2">
      <h1 class="col-12 text-center my-3 colPrimaryOrange">Welcome {{ Auth::user()->name ?? 'Host' }}!</h1>
      <p class="col-12 mb-4 px-5 text-center">Welcome to your personal space. Here, you can view your apartments, add new ones and highlight them for better visibility and more guests. You can also read messages received for each apartment and enjoy additional features.</p>
      <hr class="col-12">
  	  <div class="col-3 "><img class="imgAdmin" src="Admin.jpg" alt=""></div>
  	  <div class="col-5 d-flex flex-md-column justify-content-center">
  	  	<h2>Admin</h2>
  	  	<p><strong> @test.com</strong> 3 messages to read</p>
  	  	<a>Settings</a>
  	  </div>
  	  <div class="col-3 d-flex flex-md-column justify-content-center">
         <button class="btn  text-white btn-warning">Manage your subscriptions</button>
      </div>
  </div>
  <hr>

  <div class="container ">
    <h1 class="colPrimaryOrange mb-3" class="">Sponsored apartments</h1>
   


        <div class="col-5  containerSponsor">
          <div class="col-2">
            <img class="sponsorshipImg" src="bg3.jpg" alt="">
          </div>
          <div class="col-4 m-0 infoSponsorship">
            <span>24 hour sponsorship</span>
            <span>Greater visualization</span>
          </div>
          <div class="btnSponsor">
            <button class="btn btn-outline-warning ">renew sponsorship</button>
          </div>
        </div>
        


  </div>


</div>


<style>
  hr{
    color:#EE6E10;
  }
  .containerSponsor{
    height: 3rem;
    display: flex;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.144);
    box-shadow: 0 5px 15px rgba(139, 71, 6, 0.446);

    border-radius: 10px;
  }
  .infoSponsorship{
    display: flex;
    flex-direction: column;
  }
  .sponsorshipImg{
    width: 2rem;
    height: 2rem;
    margin-left: 1rem
  }
  .btnSponsor{
    margin-left: 5.5rem;
  }


</script>
 @endsection


