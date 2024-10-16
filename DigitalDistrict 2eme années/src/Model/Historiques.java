package Model;

import java.time.LocalDate;
import java.time.LocalTime;

public class Historiques {

    public String getAction() {
        return action;
    }

    public void setAction(String action) {
        this.action = action;
    }

    private String action;



    public static void createHistorique(String action){
        LocalDate VDate= LocalDate.now();
        LocalTime VHeure= LocalTime.now();
        String date=String.valueOf(VDate);
        String heure=String.valueOf(VHeure);
        heure=heure.substring(0,8);

        DBConnection db=new DBConnection();
        String sql="INSERT INTO historique(id_historique, action, date, heure) VALUES (NULL, '"+action+"', '"+date+"', '"+heure+"');";
        try {
            db.getCon().createStatement().executeUpdate(sql);
            //System.out.println("Insertion reussi");
        }catch (Exception e){
            e.printStackTrace();
        }
    }

   /* public static void main(String[] args) {
        createHistorique("Manamboatra");
    }*/
}
