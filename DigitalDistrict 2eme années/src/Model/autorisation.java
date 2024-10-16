package Model;

import java.awt.Desktop;
import java.io.*;
import java.time.LocalDate;
import java.sql.*;

public class autorisation {
    /*public static void main(String[] args) {
        creationAutorisation("RATOVOMANALINA Sitraka Mamy","Lanonana mandritran'ny roa andro eo an-tokotany","18/07/2023-20/07/2023");
    }*/
    public static void creationAutorisation(String pour,String motif, String date){
        File folder = new File("c://DigitalDistrict//Autorisation");
        File file = new File("c://DigitalDistrict//Autorisation//Autorisation.doc");
        String aLaLigne = "<br>";

        LocalDate today = LocalDate.now();
        String todays = String.valueOf(today);
        if (!folder.exists()) {
            folder.mkdir();
        }
        if (!file.exists()) {
            try {
                file.createNewFile();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        try {
            ResultSet rs=new Model.Quariter().getQuartier();
            FileWriter writer = new FileWriter(file);
            BufferedWriter bf = new BufferedWriter(writer);
            bf.write("<DOCTYPE!>");
            bf.write("<HTML>");
            bf.write("<head><meta charset=\"UTF-8\">");
            bf.write("<style>");
            bf.write("body{text-align: center;font-family: arial;}h1{font-size: 20px;font-weight: bolder;}h2{font-size: 18px;}h3{font-size: 18px;}h4{text-align: left;font-size: 18px;}strong{font-style: italic;}span{text-decoration: underline;font-weight: bolder;font-size: 16px;}p{font-size: 18px;text-align: left;}h5{font-size: 15px;text-align: right;}");
            bf.write("</style>");
            bf.write("</head>");
            bf.write("<body>");
            bf.write("<img src=\"..\\ressources\\commune.jpg\" height=\'50px'");
            bf.write("<h1>COMMUNE URBAINE ANTANANARIVO</h1>");
            while(rs.next()){
                bf.write("<h2>Ny Sefom-pokotany eto <br>"+rs.getString(1)+"</h2>");
            }
            bf.write(aLaLigne+"<h3>Ho an' i<br>"+pour.toUpperCase()+"</h3>");
            bf.write("<h4><span>Antony </span>: <strong>Fangatahana alalana hanatanteraka "+motif+"</strong></h4>");
            bf.write(aLaLigne+"<p>Tompoko, </p>");
            bf.write("<nav id=\"article\">");
            bf.write(aLaLigne+"<p>Araka ny taratasinareo tonga eto aminay ny "+todays+", mangataka alalana hanao "+motif+", ny "+date+", dia</p>");
            bf.write("<p>Voninahitra ho anay ny mampahafantatra anareo fa ekena ny fangatahanareo.</p>");
            bf.write("<p>Ho fampiharana ny lalàna dia tokony manantona ny prefektioran'ny Polisy ianareo miaraka amin'ity taratasy ity.</p>");
            bf.write("<p>Raiso Tompoko ny haja ambony atolotro ho anareo</p>");
            bf.write("</nav>");
            bf.write(aLaLigne+"<h5>Antananarivo faha: "+todays+"</h5>");
            bf.write("<h5>Ny sefom-pokotany:</h5>");
            bf.write("</body>");
            bf.write("</HTML>");
            bf.close();
            writer.close();
            Model.Historiques.createHistorique("Naka fahazoan-dalana hanao "+motif+" amin''ny "+date+" i "+pour);
            Desktop.getDesktop().print(file);
        } catch (Exception e) {
            e.printStackTrace();
        }

    }
}