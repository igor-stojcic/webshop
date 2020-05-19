<?php require_once "partials/top.php"; ?>

<?php require_once "partials/nav.php"; ?>



<!-- ****************** PARALAX ******************************************************** -->



<div class="bgimg-1">

	<div class="big-header container-fluid w3-animate-zoom">

		<div class="row">

			<div class="col-sm-12 w3-animate-opacity">

				<div class="col-sm-6 text-center float-left mt-2">

					<img src="img/big-header1.png" class=" " alt="Responsive image">

				</div>

				<div class="col-sm-6 text-center float-right">

					<img src="img/big-header2.png" class=" " alt="Responsive image">

				</div>

			</div>

		</div>

	</div>

	

	<div id="slider"  class="container-fluid w3-animate-zoom">

		<div class="row">

		  	<div class="col-12">

			    <div class="owl-carousel owl-theme">

					<?php for ($i=1; $i < 11; $i++): ?>

						<div class="item w3-animate-opacity">

					       <img src="img/slider/<?php echo $i; ?>.jpg" alt="berries" width="200" height="auto">

					    </div>

					<?php endfor; ?>

			    </div>

		    </div>

		</div>

	</div>

</div>



<div id="section-1" style="color: #777;background-color:#282E34;text-align:center;padding:50px 10px;text-align: justify;">



	<div id="all-content" class="container-fluid text-center mt-n4 text-light">

		<div class="row row-cols-1 no-gutters w3-animate-opacity">

		    <div class="col-sm-3 col-1 mt-2">

		    	<div class="row">

		    		<div class="col mt-5 mb-5">

						<p><i class="fas fa-sun icons-2"></i></p>

						<h4 class="icons-text-left">Prirodno</h4>

					</div>

		    	</div>

		    	<div class="row">

		    		<div class="col mt-5">

		    			<p><i class="fas fa-seedling icons-4"></i></p>

						<h4 class="icons-text-left">Sveže</h4>

					</div>

		    	</div>

		    </div>

		    <div class="col-sm-6 col-10 text-center w3-animate-zoom">

		    	<div class="row">

		    		<div class="col">

						<p id="natural" class="mt-2 mb-0">100% Kvalitet</p>

	  					<p id="natural-text" class="p-2 pb-4 mt-0">Ubiramo samo plodove vrhunskog kvaliteta</p>

					</div>

		    	</div>

		    	<div class="row">

		    		<div class="col p-1 m-0">

						<img class="" src="img/mix.png" alt="raspberry">

					</div>

		    	</div>

		    </div>

		    <div class="col-sm-3 col-1 mt-2">

		    	<div class="row">

		    		<div class="col mt-5 mb-5">

		    			<p><i class="fas fa-spa icons-1"></i></p>

						<h4 class="icons-text-right">Organsko</h4>

					</div>

		    	</div>

		    	<div class="row">

		    		<div class="col mt-5">

		    			<p><i class="fas fa-crown icons-3"></i></p>

						<h4 class="icons-text-right">Kvalitetno</h4>

					</div>

		    	</div>

		    </div>

		</div>

	</div>

</div>



<div id="section-2" class="bgimg-2">

	<div class="caption w3-animate-opacity">

		<span class="border border-header" style="color: #f7f7f7;">Sveži sokovi</span>

		<div id="slider-fresh-juices-card" class="container-fluid w3-animate-zoom">

		  	<div class="row">

			  	<div class="col">

				    <div class="owl-carousel owl-theme">

						<?php foreach($products as $product): ?>

							<div class="col-sm d-flex text-center">

								<div class="card w3-animate-zoo m-5">

							    	<img class="card-img-top img-fluid" src="upload/<?php echo $product->img; ?>" alt="<?php echo $product->title; ?>">

							    	<div class="card-body description-text">

							    		<h6 class="card-title font-weight-bolder m-0"><?php echo $product->title; ?></h6>

							    	</div>

								    <div class="card-footer border-white bg-white mt-n3">

								    	<a id="details" href="fresh_juices.php" class="w3-win8-emerald w3-btn w3-small w3-round-xxlarge w3-hover-border-amber" style="border:2px dotted white;"><span class="blink-non-stop">Shop</span></a>

								    </div>

							  	</div>

							</div>

						<?php endforeach; ?>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>



<div id="section-3" style="position:relative;">

	<div style="color:#ddd;background-color:#282E34;text-align:justify;padding:20px 60px;text-align: justify;">

		<p class="text-center"><i class="fab fa-envira leavs leaf-left"></i><i class="fas fa-leaf leavs leaf-right"></i></p>

		<div class="row">

			<div class="col-sm-6 w3-animate-opacity"><p class="para">Plodovi voća predstavljaju bitan i nezamenljiv izvor materija koje su neophodne u ishrani čoveka. Pažljivo odabrane, najkvalitetnije plodove našeg voća zamrzavamo metodom brzog i dubokog smrzavanja koje se vrši na temperaturama ispod -18 °C, čime sastav vrednih nutrijenata ostaje gotovo nepromenjen. Smrzavanje i održavanje temperature na -18°C usporava he&shy;mijske i enzimske reakcije i u potpunosti onemogućava razvoj mikro&shy;organizama, dok je sadržaj vitamina veći nego kod svežih namirnica koje su odstajale više od 72 sata. Tako konzervisano voće, s obzirom na kvalitet i nutritivne karak&shy;teristike, upotpunosti odgovara svežem proizvodu.</p></div>



			<div class="col-sm-6 w3-animate-opacity"><p class="para">Najkvalitetnija kategorija zamrznute sirovine "Rolend" – duboko zamrznuti zdravi, pojedinačni, krupni plodovi voćne vrste koji su zadržali svoju strukturu, boju i ukus, pakuju se u odgovarajuću ambalažu pogodnu za upotrebu u domaćinstvu. Mlevenjem duboko zamrznutih, zdravih plodova sa karakterističnom bojom, ukusom i aromom, bez stranih primesa, dobijamo tzv. "Griz", koji se pakuje u kartonske kutije, spremni za korišćenje u pre&shy;hrambenoj industriji. Ostale duboko zamrznute plodove koji su tokom zamrzavanja oštećeni, pakuju se kao tzv. "Blok", koji svoju primenu najviše pronalazi u izradi sokova.</p></div>

		</div>

	</div>

</div>



<div id="section-4" class="container-fluid bgimg-3">

	<div class="caption">

		<span class="border border-header w3-animate-opacity" style="color: #f7f7f7;">Naš tim</span>

		<div id="slider-people-card" class="container-fluid w3-animate-zoom">

		  	<div class="row">

			  	<div class="col-md-6 offset-md-3 col-sm-12 p-0 bg-transparent text-light font-weight-bolder">

					<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">

						<ol class="carousel-indicators">

							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

							<li data-target="#myCarousel" data-slide-to="1"></li>

							<li data-target="#myCarousel" data-slide-to="2"></li>

						</ol>

						<div class="carousel-inner">

							<div class="carousel-item active">

								<div class="col-12 mb-5">

								    <img class="img-fluid border border-light rounded-circle" src="img/people/1.png" style="max-width: 150px;">

								</div>

								<div class="col-12 mt-2 mb-3">

									<p>Čovek sa vizijom, otac tri deteta, najbolji muž na svetu, potrudio se da nam svima omogući da dušu razgalimo eliksirima iz same prirode. Nesebično se zalaže da se ceo radni tim na poslu oseća kao da je kod kuće, pružajući im podršku i u lepim i onim manje lepim trenucima, što mu oni neizmerno i uzvraćaju.</p>

								</div>

								<div class="col-12 mb-3">

									<div class="vertical-line">&nbsp;</div>

								</div>

								<div class="col-12 mb-5">

									<h5 class="font-weight-bolder">Milan Perić</h5>

									<p>Direktor</p>

								</div>	

							</div>

							<div class="carousel-item">

								<div class="col-12 mb-5">

								    <img class="img-fluid border border-light rounded-circle" src="img/people/2.png" style="max-width: 150px;">

								</div>

								<div class="col-12 mt-2 mb-3">

									<p>Bez njega ništa ne bi funkcionisalo. On je pošten, hrabar, pametan, duhovit. Za njega ne postoji ni jedna poslovna prepreka koju ne može da preskoči, a sve navedeno nesebično deli sa nama. On je naša žila kucavica. On je ...</p>

								</div>

								<div class="col-12 mb-3">

									<div class="vertical-line">&nbsp;</div>

								</div>

								<div class="col-12 mb-5">

									<h5 class="font-weight-bolder">Marko Marković</h5>

									<p>Menadžer prodaje</p>

								</div>	

							</div>

							<div class="carousel-item">

								<div class="col-12 mb-5">

								    <img class="img-fluid border border-light rounded-circle" src="img/people/3.png" style="max-width: 150px;">

								</div>

								<div class="col-12 mt-2 mb-3">

									<p>Niko ne poznaje tajne prirode kao on. Ima prirodni, od Boga dat talenat da izabere najukusnije, najzdravije i najlepše iz naše prirode i stvori jedinstvene voćne eliksire, kojima niko ne može odoleti. On je majstor svog zanata ...</p>

								</div>

								<div class="col-12 mb-3">

									<div class="vertical-line">&nbsp;</div>

								</div>

								<div class="col-12 mb-5">

									<h5 class="font-weight-bolder">Filip Smiljanić</h5>

									<p>Tehnolog</p>

								</div>	

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

	

<div id="section-5" style="position:relative;">

	<div style="color:#ddd;background-color:#282E34;text-align:center;padding:20px 60px;text-align: justify;">

	  	<p class="text-center"><i class="fab fa-envira leavs leaf-left"></i><i class="fas fa-leaf leavs leaf-right"></i></p>

		<div class="row">

			<div class="col-sm-6 w3-animate-opacity">

				<h4 class="text-center pb-2">Nekada...</h4>

				<p class="para">Hranljivu i lekovitu vrednost voćnih sokova poznavali su još stari narodi, pre nekoliko hiljada godina. Tako je u grobnicama egipatskih faraona, koji su živeli 4000 godina pre naše ere, nađeno mnogo crteža koji pokazuju kako se u to doba cedila šira od grožđa i ukuvavala u grožđani med, što nije ništa drugo nego zgusnuti voćni sok. Sa sve jačim raz&shy;vojem nauke o ishrani čoveka, voćni sok je počeo dobivati i eve veću vrednost. Danas će on ubraja u izvanredno hranljive i lekovite životne namirnice. Podjednako je značajan kako za odojčad tako i za starce i iznemogle, zatim za teške fizičke radnike, trudnice, obolele itd. Nije ni čudo što se u naprednim zemljama njegova proizvodnja toliko povećala da je on postao narodno piće koje se za jevtin novac može dobiti u svakom automatu, fabrici, na ulici, u školi, u bioskopu itd.</p>

			</div>



			<div class="col-sm-6 w3-animate-opacity">

				<h4 class="text-center pb-2">Sada...</h4>

				<p class="para">Svi znamo da su potrošači često u zabludi kada kupe voćni sok na kojem stoji oznaka "100%", misleći da se radi o napitku koji sadrži samo isceđeno voće. Nažalost, njihov natpis "100%" ozna&shy;čava samo da sok nema dodatih šećera, odnosno da se sastoji isključivo od voćnog koncentrata i vode, a udeo voća kod ovih sokova je najčešće oko 50-60 odsto. U želji da ljudima koji prven&shy;stveno brinu o svom zdravlju i zdravlju njihovih članova porodice omogućimo da po pristupačnim cenama dođu do pravih "100%" organskih voćnih sokova, proizveli smo više vrsta voćnih sokova spravljenih isključivo ceđenjem sveže ubrani plodova, kojima između ostalog hranimo i našu decu. Naši "100%" voćni sokovi ne sadrže nikakve boje, arome, konzervanse ili dodatne šećere. Njihov izgled, miris i ukus potiču isključivo od voća od koga su napravljenji.</p>

			</div>

		</div>

	</div>

</div>



<!-- *********************************************************************************************************** -->



<script>

	$(document).ready(function() {

		let owl = $('.owl-carousel');

		owl.owlCarousel({

			items: 4,

			loop: true,

			margin: 10,

			nav:true,

			autoplay: true,

			autoplayTimeout: 4000,

			autoplayHoverPause: true,

			responsive:{

				0:{

				    items:1

				},

				600:{

				    items:2

				},

				830:{

				    items:3

				},

				1050:{

				    items:4

				}

			}

		});

	})

</script>



<?php require_once "partials/bottom.php"; ?>