package Model;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Date;

public class StatFunction {


    public static double get_moy_age()  {
        double moy=0;

        List ll = new ArrayList();
        ResultSet rs = null;
        Date d= new Date();
        int current_year = d.getYear()+1900;

        try{
            DBConnection db = new DBConnection();
            String sql = "select Birthday from personne";
            rs= db.getCon().createStatement().executeQuery(sql);
            while (rs.next()){
                //maka anle hoe 2000 firy izy no teraka
                String date = rs.getString("Birthday").substring(6);
                int real_date=Integer.parseInt(date);
                int age = current_year-real_date;
                ll.add(age);
            }

        }catch (Exception e){
            e.printStackTrace();
        }

        double summ  =0;
        for (int i = 0; i< ll.size(); i++){
            int getage = (int) ll.get(i);
            summ+=getage;
        }
        moy=summ / ll.size();
        return moy;


    }
    //repartition par age(kotina 19)
    public static double get_moy_majeur(){
        List ll = new ArrayList();
        ResultSet rs = null;
        Date d= new Date();
        int current_year = d.getYear()+1900;
        int cpt=0 ;
        double n=0.0;

        try{
            DBConnection db = new DBConnection();
            String sql = "select Birthday from personne";
            rs= db.getCon().createStatement().executeQuery(sql);
            while (rs.next()){
                //maka anle hoe 2000 firy izy no teraka
                String date = rs.getString("Birthday").substring(6);
                int real_date=Integer.parseInt(date);
                int age = current_year-real_date;
                if (age>=19){
                    cpt+=1;
                }
                n++;
            }

        }catch (Exception e){
            e.printStackTrace();
        }

        return cpt;
    }
    //repartition par sexe
    public static double pourcent_sexe(){
        List ll = new ArrayList();
        ResultSet rs = null;


        try{
            DBConnection db = new DBConnection();
            String sql = "select sexe from personne";
            rs= db.getCon().createStatement().executeQuery(sql);
            while (rs.next()){

                int sexe = rs.getInt("sexe");

                ll.add(sexe);
            }

        }catch (Exception e){
            e.printStackTrace();
        }
        //isan'ny bandy
        int bandy=0;
        for (int i=0;i< ll.size();i++){
            int current_sex= (int) ll.get(i);
            if (current_sex ==1){
                bandy++;
            }
        }
        return bandy;
    }
    public static int effectif(){
        ResultSet rs = null;
        ArrayList arl=new ArrayList();
        int eff=0;
        try{
            DBConnection db = new DBConnection();
            String sql = "select id from personne";
            rs= db.getCon().createStatement().executeQuery(sql);
            while (rs.next()){
                int id=rs.getInt(1);
                arl.add(id);
            }
            eff=arl.size();
        }catch (Exception e){
            e.printStackTrace();
        }
        return eff;
    }
}