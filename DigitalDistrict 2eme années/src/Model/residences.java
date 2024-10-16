package Model;
import java.awt.*;
import java.io.*;
import java.sql.ResultSet;
import java.sql.Statement;
import java.time.LocalDate;
public class residences {
    /*public static void main(String[] args) {

        creationResidence(6);
    }*/
    public static void creationResidence(int id) {
        DBConnection db = new DBConnection();
        Statement stm = null;

        File folder = new File("C://DigitalDistrict/Certificat de residence");
        File file = new File("C://DigitalDistrict/Certificat de residence/residences.doc");

        String espace = " ";
        String aLaLigne = "\n";
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
            String sql = "SELECT * FROM personne WHERE id=" + id + ";";
            ResultSet rs = db.getCon().createStatement().executeQuery(sql);
            String sqlpere="SELECT * FROM pere WHERE id_fils="+ id +";";
            ResultSet rspere = db.getCon().createStatement().executeQuery(sqlpere);
            String sqlmere="SELECT * FROM mere WHERE id_fils="+ id +";";
            ResultSet rsmere = db.getCon().createStatement().executeQuery(sqlmere);

            while (rs.next() && rspere.next() && rsmere.next()) {
                String nom = rs.getString("Lastname").toUpperCase(), prenom = rs.getString("Firstname");
                String dateDeNaissance = rs.getString("Birthday"), lieuDeNaissance = rs.getString("Birthplace");
                String numCIN = rs.getString("CIN"), dateCIN = " ", lieuCIN = " ";
                String passeport = " ", datePasseport = " ", validitePasseport = " ";
                String nomPere = rspere.getString("Nom");
                String nomMere = rsmere.getString("Nom");
                String profession = rs.getString("Profession"), nationalite = rs.getString("Nationalite");
                String addresse = rs.getString("adress"), numeroCarnet = "";

                FileWriter writer = new FileWriter(file);
                BufferedWriter bf = new BufferedWriter(writer);
                
                ResultSet qt=Model.Quariter.getQuartier();
                String quart="";
                while(qt.next()) {
                	quart=qt.getString(1);
                }

                bf.write("<DOCTYPE!>");
                bf.write("<HTML>");
                /*bf.write("<head><link rel=\"stylesheet\" href=\"style.css\"></head>");*/
                bf.write("<head><style>");
                bf.write("body {text-align: center;font-family: Calibri;}.h11 {font-size: 16px;}.h12 {font-size: 14px;}.h21 {font-size: 14px;}div {text-align: left;}pre {font-family: Calibri;font-size: 14px;}span {font-weight: bold;font-size: 16px;}p {margin: 0;text-align: right;}");
                bf.write("</style><meta CHARSET='utf-8'/></head>");
                bf.write("<body>");
                bf.write("<img src=\"..\\ressources\\republique.jpeg\" id=\"republique\"></br>");
                bf.write("<h1 class='h11'>MINISTERAN'NY ATI-TANY SY NY FITSINJARAM-PAHEFANA<br>PREFEKTIORAN'NY POLISY ANTANANARIVO<br>DISTRIKAN'ANTANANARIVO</h1>");
                bf.write("<h1 class='h12'>FANAMARINAM-PONENANA<br>(Certificat de residence)</h1><br>");
                bf.write("<h2 class='h21'>Ny sefom-pokotany eto "+quart+" dia manamarina fa :</h2><div><br><br><br>");
                bf.write("<pre>");
                if (nom.length() <= 22) {
                    bf.write("Anarana :    <span>" + nom + espace.repeat(39 - nom.length())+"</span>");
                    if (prenom.length() <= 17) {
                        bf.write("Fanampiny :    <span>" + prenom+"</span>");
                    } else if (prenom.length() > 17 && prenom.length() < 34) {
                        bf.write("Fanampiny :    <span>" + prenom.subSequence(0, 17) +"</span>"+ aLaLigne.repeat(1));
                        bf.write(espace.repeat(109) +"<span>"+ prenom.subSequence(17, prenom.length())+"</span>");
                    } else {
                        bf.write("Fanampiny :    <span>" + prenom.subSequence(0, 17) +"</span>"+ aLaLigne.repeat(1));
                        bf.write(espace.repeat(109) +"<span>"+ prenom.subSequence(17, 34)+"</span>");
                    }
                } else {
                    bf.write("Anarana :    <span>" + nom.subSequence(0, 22) +"</span>"+ espace.repeat(22));
                    if (prenom.length() < 17) {
                        bf.write("Fanampiny :    <span>" + prenom+"</span>");
                    } else {
                        bf.write("Fanampiny :    <span>" + prenom.subSequence(0, 17)+"</span>");
                    }
                    bf.write(aLaLigne.repeat(1));
                    if (nom.length() < 44) {
                        bf.write(espace.repeat(20) +"<span>"+ nom.subSequence(22, nom.length())+"</span>");
                        if (prenom.length() > 17 && prenom.length() < 34) {
                            bf.write(espace.repeat(109 - nom.length()) +"<span>"+ prenom.subSequence(17, prenom.length())+"</span>");
                        }
                        if (prenom.length() > 34) {
                            bf.write(espace.repeat(109 - nom.length()) +"<span>"+ prenom.subSequence(17, 34)+"</span>");
                        }
                    } else {
                        bf.write(espace.repeat(20) +"<span>"+ nom.subSequence(22, 44)+"</span>");
                        if (prenom.length() > 17 && prenom.length() < 34) {
                            bf.write(espace.repeat(109) +"<span>"+ prenom.subSequence(17, prenom.length())+"</span>");
                        }
                        if (prenom.length() > 34) {
                            bf.write(espace.repeat(109) +"<span>"+ prenom.subSequence(17, 34)+"</span>");
                        }
                    }

                }
                bf.write("</pre><br>");
                bf.write("<pre>");
                bf.write("Teraka tamin'ny : <span>" + dateDeNaissance+"</span>");
                bf.write(espace.repeat(46 - dateDeNaissance.length()) + "Tao : <span>" + lieuDeNaissance+"</span>");
                bf.write("</pre><br>");
                bf.write("<pre>");
                bf.write("Kara-panondro : <span>" + numCIN + espace.repeat(21 - numCIN.length())+"</span>");
                bf.write("ny : <span>" + dateCIN + espace.repeat(3)+"</span>");
                bf.write(espace.repeat(9 - dateCIN.length()) + "Tao : <span>" + lieuCIN+"</span>");
                bf.write("</pre><br>");
                bf.write("<pre>");
                bf.write("Pasipaoro : <span>" + passeport + espace.repeat(44 - passeport.length())+"</span>");
                bf.write("ny : <span>" + datePasseport + espace.repeat(12 - datePasseport.length())+"</span>");
                bf.write("faharetany : <span>" + validitePasseport+"</span>");
                bf.write("</pre><br>");
                bf.write("<pre>");
                if (nomPere.length() <= 22) {
                    bf.write("Ray : <span>" + nomPere + espace.repeat(49 - nomPere.length())+"</span>");
                    if (nomMere.length() < 25) {
                        bf.write("Reny : <span>" + nomMere+"</span>");
                    } else if (nomMere.length() > 25 && nomMere.length() < 50) {
                        bf.write("Reny : <span>" + nomMere.subSequence(0, 25) +"</span>"+ aLaLigne.repeat(1));
                        bf.write(espace.repeat(92) +"<span>"+ nomMere.subSequence(25, nomMere.length())+"</span>");
                    } else {
                        bf.write("Reny : <span>" + nomMere.subSequence(0, 25) +"</span>"+ aLaLigne.repeat(1));
                        bf.write(espace.repeat(92) +"<span>"+ nomMere.subSequence(25, 50)+"</span>");
                    }

                } else {
                    bf.write("Ray : <span>" + nomPere.subSequence(0, 22) +"</span>"+ espace.repeat(32));
                    if (nomMere.length() < 25) {
                        bf.write("Reny : <span>" + nomMere+"</span>");
                    } else {
                        bf.write("Reny : <span>" + nomMere.subSequence(0, 25)+"</span>");
                    }
                    bf.write(aLaLigne.repeat(1));
                    if (nomPere.length() < 44) {
                        bf.write(espace.repeat(10) +"<span>"+ nomPere.subSequence(22, nomPere.length())+"</span>");
                        if (nomMere.length() < 50 && nomMere.length() > 25) {
                            bf.write(espace.repeat(104 - nomPere.length()) +"<span>"+ nomMere.subSequence(25, nomMere.length())+"</span>");
                        }
                        if (nomMere.length() > 50) {
                            bf.write(espace.repeat(104 - nomPere.length()) +"<span>"+ nomMere.subSequence(25, 50)+"</span>");
                        }
                    } else {
                        bf.write(espace.repeat(10) +"<span>"+ nomPere.subSequence(22, 44)+"</span>");
                        if (nomMere.length() > 50) {
                            bf.write(espace.repeat(92 - 44) +"<span>"+ nomMere.subSequence(25, 50)+"</span>");
                        }
                        if (nomMere.length() < 50 && nomMere.length() > 25) {
                            bf.write(espace.repeat(92 - 44) +"<span>"+ nomMere.subSequence(25, nomMere.length())+"</span>");
                        }
                    }

                }
                bf.write("</pre><br>");
                bf.write("<pre>");
                if (profession.length() < 17) {
                    bf.write("Asa aman-draharaha : <span>" + profession + espace.repeat(22 - profession.length())+"</span>");
                    bf.write("Zom-pirenena : <span>" + nationalite+"</span>");
                } else {
                    bf.write("Asa aman-draharaha : <span>" + profession.subSequence(0, 15) +"</span>"+ espace.repeat(22 - 15));
                    bf.write("Zom-pirenena : <span>" + nationalite+"</span>");
                    bf.write(aLaLigne.repeat(1));
                    if (profession.length() < 34) {
                        bf.write(espace.repeat(21) + profession.subSequence(15, profession.length())+"</span>");
                    }
                    if (profession.length() > 34) {
                        bf.write(espace.repeat(21) + profession.subSequence(15, 34)+"</span>");
                    }
                }
                bf.write("</pre><br>");
                bf.write("<pre>");
                bf.write("Dia monina eto  <span>" + addresse+"</span>");
                bf.write("  ary voasoratra ho isan'ny fokonolona laharana faha : <span>" + id+"</span>");
                bf.write("</pre><br>");
                bf.write("<br><br><br><br><br><footer>");
                bf.write("<p class='p1'>Antananarivo faha : <span>" + todays+"</span></p>");
                bf.write("<p class='p2'>Ny sefom-pokotany</p>");
                bf.write("</footer>");
                bf.write("</div></body>");
                bf.write("</HTML>");
                bf.close();
                writer.close();
                Desktop.getDesktop().print(file);


                Statement stt=db.getCon().createStatement();
                String sql2="SELECT * FROM personne WHERE id='"+id+"'";
                ResultSet rs2=db.getCon().createStatement().executeQuery(sql);
                String nomCo="";
                while(rs2.next()) {
                String nom2=rs2.getString(2);
                String prenom2=rs2.getString(3);
                nomCo= nom2+" "+prenom2;
                }
                String action ="Naka fanamarinam-ponenana i "+nomCo;
                Historiques.createHistorique(action);
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

}
