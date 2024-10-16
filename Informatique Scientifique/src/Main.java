import javax.sound.midi.Soundbank;

public class Main {

    public static void main(String[] args) {
        Euler el = new Euler(0, 1, 1, 4);
        el.execute();
        el.affiche();
        System.out.println("-------TAYLOR-------");
        Taylor tl = new Taylor(1, 3, -2, 4);
        tl.execute();
        tl.affiche();
        System.out.println("--------POINT MILIEU------------");
        Point_Milieu pm = new Point_Milieu(0, 1, 1, 4);
        pm.execute();
        pm.affiche();
        System.out.println("-------------RUNG-KUTTTA-------------");
        Rung_kutta rg= new Rung_kutta(0,1,0.1,4);
        rg.execute();
        rg.affiche();
    }
}