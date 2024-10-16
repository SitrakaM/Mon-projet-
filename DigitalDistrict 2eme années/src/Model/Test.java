package Model;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.LocalDate;
import java.time.LocalTime;

public class Test {

	public static void main(String[] args) {
		LocalDate date=LocalDate.now();
		LocalTime time=LocalTime.now();
		String Ldate=String.valueOf(date);
		String Ltime=String.valueOf(time);
		String TString=Ltime.substring(0, 8);
		System.out.println("Date: "+Ldate+" Heure: "+TString);
		DBConnection db = new DBConnection();
		String nomCo="";
		try {
			
            String sql="SELECT * FROM personne WHERE id=3";
            ResultSet rs=db.getCon().createStatement().executeQuery(sql);
            while(rs.next()) {
            String nom=rs.getString(2);
            String prenom=rs.getString(3);
            nomCo= nom+" "+prenom;
            }
            String action =nomCo+" dia nalana tao anaty lisitra";
    		System.out.println(nomCo);

		}
		catch (SQLException e){
            e.printStackTrace();
        }
	}

}
