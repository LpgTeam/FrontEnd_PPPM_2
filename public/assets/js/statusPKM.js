
// Proses PKM
function tambahPKM(){
    var statusPKM = document.getElementById("statusPKM").innerHTML ;
    var ketPKM = "";
    var listPKM = document.getElementById("listPKM");
    var keteranganPKM = document.getElementById("keteranganPKM");
    keteranganPKM.innerHTML = "";
    listPKM.innerHTML =  "";
    var status1 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p class='text-muted'>"+
                "Form PKM telah di submit oleh dosen dan menunggu persetujuan BAU"+
            "</p>"+
        "</li>";

    var status2 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p class='text-muted'>"+
                "Form PKM telah disetujui oleh BAU dan menunggu persetujuan Kepala PPPM"+
            "</p>"+
        "</li>";        

        
    var status3 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p class='text-muted'>"+
                "Proposal disetujui oleh Kepala PPPM"+
            "</p>"+
        "</li>"; 

    var status4 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Laporan</h5>"+
            "<p class='text-muted'>"+
                "Proses persetujuan surat pernyataan oleh dosen"+
            "</p>"+
        "</li>";  

    var status5 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Laporan</h5>"+
            "<p class='text-muted'>"+
                "Melaporkan Hasil PKM Yang Dilakukan Oleh Dosen Polstat STIS"+
            "</p>"+
        "</li>";    
    
    var status6 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Selesai</h5>"+
            "<p class='text-muted'>"+
                "Kegiatan PKM Telah Selesai dilsanakan"+
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

    if (statusPKM == 1){
        listPKM.innerHTML += status1 ;}
    else if (statusPKM == 2){
        listPKM.innerHTML += status1 + status2 ;
    }
    else if (statusPKM ==  3){
        listPKM.innerHTML += status1 + status2 + status3 + status4;
    }
    else if (statusPKM == 4){
        listPKM.innerHTML += status1 + status2 + status3 + status4 + status5;
    }
    else if (statusPKM == 7){
        listPKM.innerHTML += status1 + status2 + status3 + status4 + status5 +status6;
    }
    

    if (ketPKM == "gagal"){
        keteranganPKM.innerHTML += tanda2 ;}
    else{
        listPKM.innerHTML += tanda ;
    }

    console.log("satu");
}

tambahPKM()