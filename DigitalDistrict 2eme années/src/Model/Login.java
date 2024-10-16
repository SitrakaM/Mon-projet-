
package Model;

import java.sql.*;

public class Login {
    private String fokotany;
    private String faritra;
    private String kaody;

    public String getFokotany() {
        return fokotany;
    }

    public void setFokotany(String fokotany) {
        this.fokotany = fokotany;
    }

    public String getFaritra() {
        return faritra;
    }

    public void setFaritra(String faritra) {
        this.faritra = faritra;
    }

    

    public String getKaody() {
        return kaody;
    }

    public void setKaody(String kaody) {
        this.kaody = kaody;
    }

    public Login(String fokotany, String faritra, String kaody) {
        this.fokotany = fokotany;
        this.faritra = faritra;
        this.kaody = kaody;
    }
    
    public static boolean connexion(Login login){
        ResultSet rs=null;
        boolean isValide=false;
        int cpt=0;
        try {
            DBConnection db=new DBConnection();
            //String sql="SELECT * FROM administration";
            String sql="SELECT* FROM administration WHERE Fokontany='"+login.getFokotany()+"' AND Faritra='"+login.getFaritra()+"' AND Kaody='"+login.getKaody()+"';";
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            while (rs.next()){
                cpt++;
            }
        }catch (SQLException e){
            e.printStackTrace();
        }
        if(cpt>0){
            isValide=true;
        }
        return isValide;
    }
    /*public static void main(String[] args) {
        boolean test=connexion(new Login("Andranomanalina Isotry", 1, "Y001abcdZ1G2"));
        System.out.println(test);
    }*/
}
