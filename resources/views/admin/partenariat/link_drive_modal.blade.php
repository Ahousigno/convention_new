<div class="modal fade" id="linkDriveModal" tabindex="-1" role="dialog" aria-labelledby="linkDriveModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="link_drive_content"></div>
            <div id="motif_content"></div>
        </div>
    </div>
</div>

<script>
let form = document.querySelector("#edit_demande");
form.addEventListener("submit", function(e) {
    e.preventDefault();
    if (e.target.can_be_partner.value == 'OUI') {
        document.querySelector('#motif_content').innerHTML = ""
        document.querySelector('#link_drive_content').innerHTML =
            `
                <form  method="post" accept-charset="UTF-8" enctype="multipart/form-data"> {!! csrf_field() !!}
                    <div class="modal-body">
                          <div class="form-group">
                              <label for="linkDriveModal">Envoyer un lien Google docx </label>
                              <input type="text" name="linkDriveModal" class="form-control" placeholder="https://docs.google.com/document/d/1JWm..">
                          </div>
                      <button  class="btn btn-secondary" data-dismiss="modal">fermer</button>
                      <button type="submit" onclick="document.querySelector('#edit_demande').submit()" class="btn btn-primary">envoyer</button>
                    </div>
                </form>
            `
    } else if (e.target.can_be_partner.value == 'NON') {
        document.querySelector('#link_drive_content').innerHTML = "";
        document.querySelector('#motif_content').innerHTML =
            `
              <form  method="post" accept-charset="UTF-8" enctype="multipart/form-data"> {!! csrf_field() !!}
                    <div class="modal-body">
                          <div class="form-group">
                              <label for="linkDriveModal">Entrez motif de rejet</label>
                              <input type="text" name="motif_rejet" placeholder="ici le motif de rejet" class="form-control">
                          </div>
                      <button  class="btn btn-secondary" data-dismiss="modal">fermer</button>
                      <button type="submit" onclick="document.querySelector('#edit_demande').submit()" class="btn btn-primary">envoyer</button>
                    </div>
                </form>   
            `
    } else {

        document.querySelector('#motif_content').innerHTML = "";
        document.querySelector('#link_drive_content').innerHTML = "";
        document.querySelector('#link_drive_content').innerHTML =
            `
          <div class="modal-body">
              <div class="form-group">
              <div class="alert alert-info">Veuillez selectionner un OUI ou NON</div>
              </div>
            </div>
          `
    }
})
</script>