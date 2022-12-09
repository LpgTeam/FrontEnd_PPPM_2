
// Proses PKM
function tambahPKM(){
    var statusPKM = document.getElementById("statusPKM").innerHTML ;
    var alasan = document.getElementById("alasan").innerHTML ;
    var ketPKM = "";
    var jenis = document.getElementById("jenis").innerHTML ;
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
            "<p>"+
                "Form PKM telah diajukan oleh Dosen"+
            "</p>"+
        "</li>";

    var status2 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p>"+
                "Pengajuan Form PKM sedang dalam proses"+
            "</p>"+
        "</li>";        

        
    var status3 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p>"+
                "Pengajuan Form PKM telah disetujui dan Dosen dipersilahkan untuk menyetujui surat pernyataan PKM"+
            "</p>"+
        "</li>"; 

    var status4 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-checklist'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Laporan</h5>"+
            "<p>"+
                "Melaporkan hasil kegiatan PKM yang dilakukan oleh Dosen Politeknik Statitika STIS"+
            "</p>"+
        "</li>";    
    
    var status5 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-check2-square'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Selesai</h5>"+
            "<p>"+
                "Kegiatan PKM Telah Selesai dilaksanakan"+
            "</p>"+
        "</li>";

        
    var status6 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
        "<span class='timeline-icon2'>"+
            "<i class='bi bi-x-lg'></i>"+
        "</span>"+
            "<h5 class='fw-bold'>Ditolak Kepala PPPM</h5>"+
            "<p>"+
            alasan
            "</p>"+
        "</li>";

    var status7 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
        "<span class='timeline-icon2'>"+
            "<i class='bi bi-x-lg'></i>"+
        "</span>"+
            "<h5 class='fw-bold'>PKM Ditolak</h5>"+
            "<p>"+
                "Alokasi dana tidak disetujui"+
            "</p>"+
        "</li>";


    var status8 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-card-list'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Form</h5>"+
            "<p>"+
                "Menunggu form PKM disetujui oleh Kepala PPPM"+
            "</p>"+
        "</li>";
    
    var status9 = innerHTML = 
        "<li class='timeline-item mb-5'>"+
            "<span class='timeline-icon'>"+
                "<i class='bi bi-check2-square'></i>"+
            "</span>"+
            "<h5 class='fw-bold'>Selesai</h5>"+
            "<p>"+
                "Rangkaian kegiatan PKM telah selesai dilaksanakan"+
            "</p>"+
        "</li>";

    var tanda = innerHTML = 
        "<h6 style='background : #38E54D; font-size : 5px;'>&nbsp</h6>";

    var tanda2 = innerHTML = 
        "<h6 style='background : #CF0A0A; font-size : 5px;'>&nbsp</h6>";



if (jenis == "Mandiri") {   
    if (statusPKM == 1){
        listPKM.innerHTML += status8 ;}
    else if (statusPKM == 7){
        listPKM.innerHTML += status8 + status9 ;
    }
} else {
    if (statusPKM == 1){
        listPKM.innerHTML += status1 ;}
    else if (statusPKM == 2){
        listPKM.innerHTML += status1 + status2 ;
    }
    else if (statusPKM ==  3){
        listPKM.innerHTML += status1 + status2 + status3 ;
    }
    else if (statusPKM == 4){
        listPKM.innerHTML += status1 + status2 + status3 + status4 ;
    }
    else if (statusPKM == 5){
        listPKM.innerHTML += status6;
    }
    else if (statusPKM == 6){
        listPKM.innerHTML += status7;
    }
    else if (statusPKM == 7){
        listPKM.innerHTML += status1 + status2 + status3 + status4 + status5;
    }     

    if (statusPKM == 5 || statusPKM == 6){
        keteranganPKM.innerHTML += tanda2 ;}
    else{
        listPKM.innerHTML += tanda ;
    }
}

    console.log(jenis);
}

tambahPKM()