
package Model;


import java.sql.*;
public class Quariter {
    private String nom;
    private String faritra;
    
    


    public static ResultSet getQuartier(){
        DBConnection db=new DBConnection();
        ResultSet rs=null;
        try {
            rs=db.getCon().createStatement().executeQuery("SELECT * FROM administration");
        } catch (Exception e) {
        }
        return rs;
    }

    public static String Faritra() {
    	String faritra="";
    	ResultSet rs=getQuartier();
    	try {
			while(rs.next()) {
				faritra=rs.getString(2);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return faritra;
    	
    }
    public static String Fokontany() {
    	String faritra="";
    	ResultSet rs=getQuartier();
    	try {
			while(rs.next()) {
				faritra=rs.getString(1);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return faritra;
    	
    }
}
