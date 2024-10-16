package Model;
import java.sql.*;
public class Update {
    public static void supprimer(String nomco){
        try{
            DBConnection db=new DBConnection();
            String sql="DELETE FROM personne WHERE CONCAT(Lastname,' ',Firstname) LIKE '%"+nomco+"%'";
            db.getCon().createStatement().executeUpdate(sql);

        }
        catch (SQLException e){
            e.printStackTrace();
        }

    }
    public static void update(String nomco){
        try{
            DBConnection db=new DBConnection();
            String sql="UPDATE FROM personne WHERE CONCAT(Lastname,' ',Firstname) LIKE '%"+nomco+"%'";
            db.getCon().createStatement().executeUpdate(sql);

        }
        catch (SQLException e){
            e.printStackTrace();
        }


    }
}
