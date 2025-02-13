@extends('layouts.app')

@section('title', 'create account')

@section('content')

    <div class="pagetitle">
        <h1>Create Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Account</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container-fluid">
          <div class="container mt-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <input type="text" id="search" class="form-control w-50" placeholder="Search by CIN, NAME   ...">
                  <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#ajouterPersonneModal">Add User</button>
              </div>
      
          <!-- Table des personnes -->
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Last Name</th>
                      <th>Name</th>
                      <th>CNE</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody id="personnes-list">
                  @foreach($personnes as $personne)
                      <tr>
                          <td>{{ $personne->nom }}</td>
                          <td>{{ $personne->prenom }}</td>
                          <td>{{ $personne->cin }}</td>
                          <td>
                              <button class="btn btn-warning btn-sm creer-compte" data-bs-toggle="modal" data-bs-target="#createAccountModal"
                              data-person-id="{{ $personne->id }}" 
                              data-person-nom="{{ $personne->nom }}" 
                              data-person-prenom="{{ $personne->prenom }}">
                                  Create Account
                              </button>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      
        
      
          <!-- Create Account Modal -->
          <div class="modal fade" id="createAccountModal" tabindex="-1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Create User Account</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                        <form id ="createAccountForm" action="{{ route('admin.comptes.creer') }}" method="POST">
                          @csrf
                          <input type="hidden" name="personne_id" id="personne_id">
                              <div class="mb-3">
                                  <label for="role" class="form-label">Role</label>
                                  <select class="form-select" id="role" name="role">
                                      <option value="SCRUM_MASTER">Scrum Master</option>
                                      <option value="PRODUCT_OWNER">Product Owner</option>
                                      <option value="TEAM_MEMBER">Team Member</option>
                                  </select>
                              </div>
                              <div class="mb-3">
                                <label for="login" class="form-label">Generated Login</label>
                                <input type="text" id="login" name="login" class="form-control" readonly
                                       >
                            </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Generated Password</label>
                                <input type="text" id="password" name="password" class="form-control" readonly
                                      >
                            </div>
                              <button type="submit" class="btn btn-success">Create</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div> 
      
      <!-- Modale d'ajout de personne -->
      <div class="modal fade" id="ajouterPersonneModal" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Ajouter une personne</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <form action="{{ route('admin.personnes.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                          <div class="mb-3">
                              <label>Last Name</label>
                              <input type="text" name="nom" class="form-control" required>
                          </div>
                          <div class="mb-3">
                              <label>Name</label>
                              <input type="text" name="prenom" class="form-control" required>
                          </div>
                          <div class="mb-3">
                              <label>CIN</label>
                              <input type="text" name="cin" class="form-control" required>
                          </div>
                      
                      <div class="mb-3">
                          <label for="editEmail" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control">
                      </div>
                      <div class="mb-3">
                          <label for="editPhone" class="form-label">Phone</label>
                          <input type="text" name="telephone" class="form-control">
                      </div>
                  </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-warning">Add</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      </div>
    </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
      <script>
  $(document).ready(function () {
      $('#createAccountModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var personId = button.data('person-id');
          var personNom = button.data('person-nom');
          var personPrenom = button.data('person-prenom');
          var modal = $(this);
  
          // Générer automatiquement le login et le mot de passe
          var login = personNom.toLowerCase() + personPrenom.toLowerCase() + "@gmail.com";
          var password = Math.random().toString(36).slice(-8);
  
          // Remplir les champs du modal
          modal.find('#login').val(login);
          modal.find('#password').val(password);
          modal.find('#personne_id').val(personId);
      });
  
      // ✅ 2. Soumission du formulaire avec AJAX
      $('#createAccountForm').submit(function (e) {
      e.preventDefault(); // Empêcher le rechargement de la page
  
      $.ajax({
      url: "/admin/comptes/creer",
      type: "POST",
      data: {
          personne_id: $('#personne_id').val(),
          login: $('#login').val(),
          password: $('#password').val(),
          role: $('#role').val()
      },
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // ✅ Ajout de l'en-tête CSRF
      },
      success: function (response) {
          try {
              console.log("Réponse reçue :", response);
  
              if (response.success) {
                  alert("✅ " + response.message + "\n🔑 Login: " + response.generatedLogin + "\n🔒 Mot de passe: " + response.generatedPassword);
                  $('#createAccountModal').modal('hide');
              } else {
                  alert("❌ " + response.message);
              }
          } catch (error) {
              alert("❌ Une erreur est survenue lors du traitement de la réponse.");
              console.log("Erreur JS :", error);
          }
      },
      error: function (xhr) {
          try {
              var response = JSON.parse(xhr.responseText);
              alert("❌ " + response.message);
          } catch (error) {
              alert("❌ Erreur lors de la requête !");
          }
          console.log("Erreur AJAX :", xhr.responseText);
      }
  });
  
     
             
  });
  
  });
  
     
  
  
  
      
      document.getElementById('search').addEventListener('keyup', function() {
          let value = this.value.toLowerCase();
          document.querySelectorAll("#personnes-list tr").forEach(row => {
              row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
          });
      });
      </script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

       @if(session('message'))
       <script>
           Swal.fire({
               title: 'Alerte',
               text: '{{ session('message') }}',
               icon: 'warning',
               confirmButtonText: 'OK'
           });
       </script>
     @endif
      
     
      
  
    
@endsection
