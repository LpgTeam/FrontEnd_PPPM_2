// Proses Peneltian
function tambah(){
    var status = document.getElementById("status").innerHTML ;
    var jenis = document.getElementById("jenis").innerHTML ;
    var ket = "";
    var list = document.getElementById("list");
    var keterangan = document.getElementById("keterangan");
    keterangan.innerHTML = "";
    list.innerHTML =  "";
    var status1 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p class='text-muted'>"+
                "Proposal telah di submit oleh dosen dan menunggu persetujuan BAU"+
            "</p>"+
        "</li>";

    var status2 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p class='text-muted'>"+
                "Proposal telah disetujui oleh BAU dan menunggu persetujuan Reviewer"+
            "</p>"+
        "</li>"; 
        

    var status3 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p class='text-muted'>"+
                "Proposal telah disetujui oleh reviewer dan menunggu persetujuan dari Kepala PPPM"+
            "</p>"+
        "</li>"; 
        
    var status4 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p class='text-muted'>"+
                "Proposal disetujui oleh Kepala PPPM dan menunggu penanda tanganan oleh Direktur Polstat STIS"+
            "</p>"+
        "</li>"; 

    var status5 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Proposal</h5>"+
            "<p class='text-muted'>"+
                "Proposal ditandatangani oleh Direktur Polstat STIS"+
            "</p>"+
        "</li>"; 

    var status6 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Pendanaan</h5>"+
            "<p class='text-muted'>"+
                "Melampirkan bukti pendanaan untuk kegiatan publikasi hasil dari penelitian"+
            "</p>"+
        "</li>";    

    var status61 = innerHTML = 
    "<li class='timeline-item mb-5'>"+
    "<span class='timeline-icon'>"+
        "<i class='bi bi-card-list'></i>"+
    "</span>"+
    "<h5 class='fw-bold'>Kontrak</h5>"+
    "<p class='text-muted'>"+
        "Proses Persetujuan Kontrak Penelitian"+
    "</p>"+
"</li>";  

    var status7 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Laporan</h5>"+
            "<p class='text-muted'>"+
                "Melaporkan Hasil Penelitian Yang Dilakukan Oleh Dosen Polstat STIS"+
            "</p>"+
        "</li>";   
    
    var status8 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Selesai</h5>"+
            "<p class='text-muted'>"+
                "Kegiatan Penelitian Telah Selesai dilsanakan"+
            "</p>"+
        "</li>";
    
    var tanda = innerHTML = 
        "<h6 style='background : #38E54D; font-size : 5px;'>&nbsp</h6>";

    var tanda2 = innerHTML = 
        "<h6 style='background : red; font-size : 5px;'>&nbsp</h6>"+
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon' style='border-color: red'>"+
                "<i class='bi bi-file-earmark-excel'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Gagal</h5>"+
            "<p class='text-muted'>"+
                "Gagal melewati Proses"+
            "</p>"+
        "</li>";


if (jenis == "Semi Mandiri") {
    if (status == 1){
        list.innerHTML += status1 ;}
    else if (status == 2){
        list.innerHTML += status1 + status2 ;
    }
    else if (status ==  3){
        list.innerHTML += status1 + status2 + status3;
    }
    else if (status == 4){
        list.innerHTML += status1 + status2 + status3 + status4;
    }
    else if (status == 51){
        list.innerHTML += status1 + status2 + status3 + status4 + status5;
    }
    else if (status == 5){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 ;
    }
    else if (status == 6){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 + status7;
    }
    else if (status == 10){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status6 + status7 + status8;
    }
    
} else if (jenis == "Di Danai Institusi" || jenis == "Institusi"){
    if (status == 1){
        list.innerHTML += status1 ;}
    else if (status == 2){
        list.innerHTML += status1 + status2 ;
    }
    else if (status == 3){
        list.innerHTML += status1 + status2 + status3;
    }
    else if (status == 4){
        list.innerHTML += status1 + status2 + status3 + status4;
    }
    else if (status == 51){
        list.innerHTML += status1 + status2 + status3 + status4 + status5;
    }
    else if (status == 5){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 ;
    }
    else if (status == 6){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 + status7;
    }
    else if (status == 10){
        list.innerHTML += status1 + status2 + status3 + status4 + status5 + status61 + status7 + status8;
    }
}
    



    if (ket == "gagal"){
        keterangan.innerHTML += tanda2 ;}
    else{
        list.innerHTML += tanda ;
    }

    console.log(jenis);
    console.log(status);

    console.log(1);
}

tambah()
