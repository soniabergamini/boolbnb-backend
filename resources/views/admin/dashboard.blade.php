
@extends('layouts.admin')
@section('content')

  <div class="containerDash">
	<div class="row mt-2">
        <h1 class="col-12 text-center my-3 colPrimaryOrange">Welcome {{ Auth::user()->name ?? 'Host' }}!</h1>
        <p class="col-12 mb-4 px-5 text-center">Welcome to your personal space. Here, you can view your apartments, add new ones and highlight them for better visibility and more guests. You can also read messages received for each apartment and enjoy additional features.</p>
        <hr class="col-12">
		<div class="col-3 "><img class="imgAdmin" src="Admin.jpg" alt=""></div>
		<div class="col-6 d-flex flex-md-column justify-content-center">
			<h2>Admin</h2>
			<p><strong> @test.com</strong> 3 messages to read</p>
			<a>Settings</a>
		</div>
		<div class="col-2 d-flex flex-md-column justify-content-center"> <button class="btn btn-outline-warning text-white btn-warning">Manage your subscriptions</button></div>
	</div>
	<div class="d-flex flex-md-column">
		{{-- <div class="col-4 ml_3">
			<h2>I tuoi Appartameti</h2>
			<div class="carouselDash">
					<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active" data-bs-interval="10000">
							<img src="{{ asset('/storage') . '/placeholder/apartment2.jpeg' }}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item" data-bs-interval="2000">
							<img src="{{ asset('/storage') . '/placeholder/apartment4.jpeg' }}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/storage') . '/placeholder/apartment7.jpeg' }}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/storage') . '/placeholder/apartment10.jpeg' }}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/storage') . '/placeholder/apartment12.jpeg' }}" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/storage') . '/placeholder/apartment14.jpeg' }}" class="d-block w-100" alt="...">
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>

		</div> --}}
		<div class="Price">

			<h1 class="main__heading text-black">Pricing</h1>

			<div class="main__cards cards">

			  <div class="cards__inner">
				<div class="cards__card card">
				  <h2 class="card__heading">Basic</h2>
				  <p class="card__price">$4.99</p>
				  <ul role="list" class="card__bullets flow">
					<li>Access to standard workouts and nutrition plans</li>
					<li>Email support</li>
				  </ul>
				  <a href="#basic" class="card__cta cta">Get Started</a>
				</div>

				<div class="cards__card card">
				  <h2 class="card__heading">Pro</h2>
				  <p class="card__price">$7.99</p>
				  <ul role="list" class="card__bullets flow">
					<li>Access to advanced workouts and nutrition plans</li>
					<li>Priority Email support</li>
					<li>Exclusive access to live Q&A sessions</li>
				  </ul>
				  <a href="#pro" class="card__cta cta">Upgrade to Pro</a>
				</div>

				<div class="cards__card card">
				  <h2 class="card__heading">Ultimate</h2>
				  <p class="card__price">$15.99</p>
				  <ul role="list" class="card__bullets flow">
					<li>Access to all premium workouts and nutrition plans</li>
					<li>24/7 Priority support</li>
					<li>1-on-1 virtual coaching session every month</li>
					<li>Exclusive content and early access to new features</li>
				  </ul>
				  <a href="#ultimate" class="card__cta cta">Go Ultimate</a>
				</div>

			  </div>

			  <div class="overlay cards__inner"></div>
		</div>
	</div>

</div>

<style>
	@import url("https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800;900&display=swap");

body {
  /* display: grid; */
  place-items: center;
  font-family: "League Spartan", system-ui, sans-serif;
  font-size: 1.1rem;
  line-height: 1.2;
  color: #ddd;
}

ul {
  list-style: none;
}

.main {
  max-width: 75rem;
  padding: 3em 1.5em;
}

.main__heading {
  font-weight: 600;
  font-size: 2.25em;
  margin-bottom: 0.75em;
  text-align: center;
  color: #eceff1;
}

.cards {
  position: relative;
}

.cards__inner {
  display: flex;
  flex-wrap: wrap;
  gap: 2.5em;
}

.card {
  --flow-space: 0.5em;
  --hsl: var(--hue), var(--saturation), var(--lightness);
  flex: 1 1 14rem;
  padding: 1.5em 2em;
  display: grid;
  grid-template-rows: auto auto auto 1fr;
  align-items: start;
  gap: 1.25em;
  color: #eceff1;
  background-color: #2b2b2b;
  border: 1px solid #eceff133;
  border-radius: 15px;
}

.card:nth-child(1) {
  --hue: 165;
  --saturation: 82.26%;
  --lightness: 51.37%;
}

.card:nth-child(2) {
  --hue: 291.34;
  --saturation: 95.9%;
  --lightness: 61.76%;
}

.card:nth-child(3) {
  --hue: 338.69;
  --saturation: 100%;
  --lightness: 48.04%;
}

.card__bullets {
  line-height: 1.4;
}

.card__bullets li::before {
  display: inline-block;
  content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='16' title='check' fill='%23dddddd'%3E%3Cpath d='M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z' /%3E%3C/svg%3E");
  transform: translatey(0.25ch);
  margin-right: 1ch;
}

.card__heading {
  font-size: 1.05em;
  font-weight: 600;
}

.card__price {
  font-size: 1.75em;
  font-weight: 700;
}

.flow > * + * {
  margin-top: var(--flow-space, 1.25em);
}

.cta {
  display: block;
  align-self: end;
  margin: 1em 0 0.5em 0;
  text-align: center;
  text-decoration: none;
  color: #fff;
  background-color: #0d0d0d;
  padding: 0.7em;
  border-radius: 10px;
  font-size: 1rem;
  font-weight: 600;
}

.overlay {
  position: absolute;
  inset: 0;
  pointer-events: none;
  user-select: none;
  opacity: var(--opacity, 0);
  -webkit-mask: radial-gradient(
    25rem 25rem at var(--x) var(--y),
    #000 1%,
    transparent 50%
  );
  mask: radial-gradient(
    25rem 25rem at var(--x) var(--y),
    #000 1%,
    transparent 50%
  );
  transition: 400ms mask ease;
  will-change: mask;
}

.overlay .card {
  background-color: hsla(var(--hsl), 0.15);
  border-color: hsla(var(--hsl), 1);
  box-shadow: 0 0 0 1px inset hsl(var(--hsl));
}

.overlay .cta {
  display: block;
  grid-row: -1;
  width: 100%;
  background-color: hsl(var(--hsl));
  box-shadow: 0 0 0 1px hsl(var(--hsl));
}

:not(.overlay) > .card {
  transition: 400ms background ease;
  will-change: background;
}

:not(.overlay) > .card:hover {
  --lightness: 95%;
  background: hsla(var(--hsl), 0.1);
}
</style>
<script>
	console.clear();

const cardsContainer = document.querySelector(".cards");
const cardsContainerInner = document.querySelector(".cards__inner");
const cards = Array.from(document.querySelectorAll(".card"));
const overlay = document.querySelector(".overlay");

const applyOverlayMask = (e) => {
  const overlayEl = e.currentTarget;
  const x = e.pageX - cardsContainer.offsetLeft;
  const y = e.pageY - cardsContainer.offsetTop;

  overlayEl.style = `--opacity: 1; --x: ${x}px; --y:${y}px;`;
};

const createOverlayCta = (overlayCard, ctaEl) => {
  const overlayCta = document.createElement("div");
  overlayCta.classList.add("cta");
  overlayCta.textContent = ctaEl.textContent;
  overlayCta.setAttribute("aria-hidden", true);
  overlayCard.append(overlayCta);
};

const observer = new ResizeObserver((entries) => {
  entries.forEach((entry) => {
    const cardIndex = cards.indexOf(entry.target);
    let width = entry.borderBoxSize[0].inlineSize;
    let height = entry.borderBoxSize[0].blockSize;

    if (cardIndex >= 0) {
      overlay.children[cardIndex].style.width = `${width}px`;
      overlay.children[cardIndex].style.height = `${height}px`;
    }
  });
});

const initOverlayCard = (cardEl) => {
  const overlayCard = document.createElement("div");
  overlayCard.classList.add("card");
  createOverlayCta(overlayCard, cardEl.lastElementChild);
  overlay.append(overlayCard);
  observer.observe(cardEl);
};

cards.forEach(initOverlayCard);
document.body.addEventListener("pointermove", applyOverlayMask);

</script>
 @endsection


