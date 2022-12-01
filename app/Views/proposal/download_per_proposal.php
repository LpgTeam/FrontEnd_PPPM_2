<div class="d-flex justify-content-between">
    <a href="/penelitian/view_proposal_savelocal/<?= $penelitian['id_penelitian']; ?>/1" class="btn btn-secondary">Lihat Proposal </a>
    <a href="/penelitian/download-proposal-akhir/<?= $penelitian['id_penelitian']; ?>/2" class="btn btn-primary">Download Proposal </a>
</div>

<div id="modal-proposal" class="modal modal-xl fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full modal-xl mx-auto">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#506396;">
                <h5 class="modal-title" id="modal-title" style="color:white;"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" style="color:white;"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row holds-the-iframe">
                    <iframe id="iframe-doc" src="" style="width:100%; height: 85vh" class="my-auto"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.proposal').click(function() {
        file = $(this).attr('data-file');
        nama = $(this).attr('data-nama');
        $("#iframe-doc").attr("src", "<?= base_url() ?>/proposal/" + file);
        $("#modal-title").html(nama);
        $("#modal-proposal").modal('show');
    });
</script>

<!-- <hr>
Download P1-P5
<div class="d-flex justify-content-between">
    <div class="col-md-4 col-lg-6">
        <a href="/penelitian/download-p1-proposal/<//?= $penelitian['id_penelitian']; ?>" class="btn btn-primary m-1">
            Download P1 Proposal
        </a>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div class="col-md-4 col-lg-6">
        <a href="/penelitian/download-p2-proposal/<//?= $penelitian['id_penelitian']; ?>" class="btn btn-primary m-1">
            Download P2 Proposal
        </a>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div class="col-md-4 col-lg-6">
        <a href="/penelitian/download-p3-proposal/<//?= $penelitian['id_penelitian']; ?>" class="btn btn-primary m-1">
            Download P3 Proposal
        </a>
    </div>
</div>


<div class="d-flex justify-content-between">
    <div class="col-md-4 col-lg-6">
        <a href="/penelitian/download-p4-proposal/<//?= $penelitian['id_penelitian']; ?>" class="btn btn-primary m-1">
            Download P4 Proposal
        </a>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div class="col-md-4 col-lg-6">
        <a href="/penelitian/download-p5-proposal/<//?= $penelitian['id_penelitian']; ?>" class="btn btn-primary m-1">
            Download P5 Proposal
        </a>
    </div>
</div> -->