package Model;

import java.sql.*;
import javax.swing.JButton;

public class Afficher {


                                //Afficher tout
    public static ResultSet getAll(){
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT * FROM personne";
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            /*while (rs.next()){
                int Id=rs.getInt(1);
                String nom=rs.getString(2);
                //System.out.println("Id= "+Id+" Nom="+nom);
            }*/
        }catch (SQLException e){
            e.printStackTrace();
        }
     return rs;
    }
    
    public static ResultSet getById(int id){
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT * FROM personne WHERE id="+id;
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            /*while (rs.next()){
                int Id=rs.getInt(1);
                String nom=rs.getString(2);
                //System.out.println("Id= "+Id+" Nom="+nom);
            }*/
        }catch (SQLException e){
            e.printStackTrace();
        }
     return rs;
    }

    public static ResultSet afficherNomPrenom() {
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT Lastname,Firstname FROM personne";
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
        }catch (SQLException e){
            e.printStackTrace();
        }
        return rs;
    }
    
    public static ResultSet getPere(int id){
        ResultSet rs=null;
        try{
            DBConnection db=new DBConnection();
            rs=db.getCon().createStatement().executeQuery("SELECT * FROM Personne INNER JOIN Pere WHERE pere.id_fils=personne.id AND id_fils="+id);
        }catch(Exception e){
            e.printStackTrace();
        }
        return rs;
    }
    
    public static ResultSet getMere(int id){
        ResultSet rs=null;
        try{
            DBConnection db=new DBConnection();
            rs=db.getCon().createStatement().executeQuery("SELECT * FROM Personne INNER JOIN mere WHERE mere.id_fils=personne.id AND id_fils="+id);
        }catch(Exception e){
            e.printStackTrace();
        }
        return rs;
    }//Recherche par nom et prenom
    public static ResultSet getNomPrenom(String nomco){
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT * FROM personne WHERE CONCAT(Lastname,' ',Firstname) LIKE '%"+nomco+"%'" ;
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            /*while (rs.next()){
                int Id=rs.getInt(1);
                String Name=rs.getString(2);
                String First=rs.getString(3);
                System.out.println("Id= "+Id+" Nom="+Name+" Presonne= "+First);
            }*/
        }catch (SQLException e){
            e.printStackTrace();
        }
        return rs;
    }

    
     public static ResultSet getNomPrenomAdresse(String nomco,String addr){
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT * FROM personne WHERE CONCAT(Lastname,' ',Firstname) LIKE '%"+nomco+"%' AND adress LIKE '%"+addr+"%';";
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            /*while (rs.next()){
                int Id=rs.getInt(1);
                String Name=rs.getString(2);
                String First=rs.getString(3);
                System.out.println("Id= "+Id+" Nom="+Name+" Presonne= "+First);
            }*/
        }catch (SQLException e){
            e.printStackTrace();
        }
        return rs;
    }

     public static ResultSet getPersonne(String champ,String valeur){
         ResultSet rs=null;
         try {
             DBConnection db=new DBConnection();
             String sql;
             sql = "SELECT * FROM personne WHERE " + champ + " LIKE '%" + valeur + "%'";
             rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                     ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
         }catch (SQLException e){
             e.printStackTrace();
         }
         return rs;
     }
                                //  To String

    public static String[][] resultsettoString(ResultSet liste){
        String[][] reponse=null;
        try {
            int col=liste.getMetaData().getColumnCount();
            liste.last();      
        int ligne=liste.getRow();
        //System.out.println("colonne: "+col+" ligne: "+ligne);
        reponse=new String[ligne][col];
        liste.beforeFirst();
        int i=0;
        while (liste.next()) {
           for (int j=0;j<col;j++) {
                reponse[i][j] = liste.getString(j+1);
            }
           // new JButton DButton=new JButton("DETAILS")
            //reponse[i][j+1]=new JButton("DETAILS");
            i++;
        }
        } catch (Exception e) {
        }
        return reponse;
    }
    
    public static ResultSet getHistorique(){
        ResultSet rs=null;
        try {
            DBConnection db=new DBConnection();
            String sql="SELECT * FROM historique ORDER BY id_historique DESC";
            rs=db.getCon().createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,
                    ResultSet.CONCUR_READ_ONLY).executeQuery(sql);
            /*while (rs.next()){
                int Id=rs.getInt(1);
                String nom=rs.getString(2);
                //System.out.println("Id= "+Id+" Nom="+nom);
            }*/
        }catch (SQLException e){
            e.printStackTrace();
        }
     return rs;
    }
    
    
    
   /*public static void main(String[] args) throws Exception{
        resultsettoString(getNomPrenomAdresse("Julien","Lot"));
    }*/
}
