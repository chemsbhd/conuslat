@extends('layouts.app')

@section('content')

<div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<!--====== FEATURE ONE PART START ======-->
<section class="custom-features-area custom-features-one">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="custom-section-title text-center">
            </div>
            <!-- row -->
         </div>
      </div>
      <!-- row -->
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="custom-features-style-one text-center">
               <div class="custom-features-content">
                  <h4 class="custom-features-title">Insertion</h4>
                  <p class="custom-text">
                    100 personnes seront insérées dans la base de données.
                  </p>
                  <div class="custom-features-btn rounded-buttons">
                    <!-- Formulaire pour créer 100 utilisateurs -->
                    <form action="{{ route('admin.createUsers') }}" method="POST" class="custom-form">
                          @csrf
                          <button type="submit" class="btn custom-primary-btn-outline rounded-full">
                             Créer 100 utilisateurs
                          </button>
                    </form>
                  </div>
               </div>
            </div>
            <!-- single features -->
         </div>
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="custom-features-style-one text-center">
               <div class="custom-features-content">
                  <h4 class="custom-features-title">Loterie</h4>
                  <p class="custom-text">
                    Une personne non marocaine sera tiré dans la base de données et la nationalité sera changée en marocaine.
                  </p>
                  <div class="custom-features-btn rounded-buttons">
                     <!-- Formulaire pour lancer la loterie -->
                    <form action="{{ route('admin.lottery') }}" method="POST" class="custom-form">
                       @csrf
                       <button type="submit" class="btn custom-primary-btn-outline rounded-full">
                          Lancer la loterie
                       </button>
                    </form>
                  </div>
               </div>
            </div>
            <!-- single features -->
         </div>
         <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="custom-features-style-one text-center">
               <div class="custom-features-content">
                  <h4 class="custom-features-title">Visa</h4>
                  <p class="custom-text">
                     Vous pouvez valider ou non les demandes de visas réalisées par les utilisateurs.
                  </p>
                  <div class="custom-features-btn rounded-buttons">
                    <form action="{{ route('admin.visa') }}" method="GET" class="custom-form">
                       @csrf
                       <button type="submit" class="btn custom-primary-btn-outline rounded-full">
                          Vérifier les demandes
                       </button>
                    </form>
                  </div>
               </div>
            </div>
            <!-- single features -->
         </div>
      </div>
      <!-- row -->
            <!-- Message de succès -->
     @if(session('success'))
     <div class="alert alert-success" style="margin-top: 20px; padding: 20px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; color: #155724; font-size: 16px; font-weight: 500; box-shadow: 0 4px 12px rgba(0, 255, 0, 0.1);">
           {{ session('success') }}
     </div>
  @endif

  <!-- Message d'erreur -->
  @if(session('error'))
     <div class="alert alert-danger" style="margin-top: 20px; padding: 20px; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 8px; color: #721c24; font-size: 16px; font-weight: 500; box-shadow: 0 4px 12px rgba(255, 0, 0, 0.1);">
           {{ session('error') }}
     </div>
  @endif 
    </div>
      <!-- container -->
   </section>
 <!--====== FEATURE ONE PART ENDS ======-->


 <div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <br><br><br><br><br><br><br><br>
   </div>

@endsection
