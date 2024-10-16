public class Rung_kutta implements algo{
    public double a,b,alpha,n;
    public Rung_kutta(double a,double b,double alpha, double n){
        this.a = a;
        this.b = b;
        this.alpha = alpha;
        this.n = n;
    }
    @Override
    public double[] execute() {
        double h = (b-a)/n;
        double[] t= new double[5];
        double[] w= new double[5];
        double[] k= new double[5];
        t[0]= a;
        w[0]= alpha;
        k[1]= h*f(t[0],w[0]);
        k[2]= h*f(t[0]+(h/2),w[0]+((1/2)*k[1]));
        k[3]= h*f(t[0]+(h/2),w[0]+((1/2)*k[2]));
        k[4]= h*f(t[0]+h,w[0]+k[3]);
        for(int i=1;i<=n;i++) {
            w[i]= w[i-1]+((1/6)*(k[1]+2*k[2]+2*k[3]+k[4]));
            t[i]= a + (i*h);
        }
        return w;
    }

    @Override
    public void affiche() {
        for (int i=0;i<=n;i++){
            System.out.println("W"+i+": "+this.execute()[i]);
        }
    }

    @Override
    public double f(double t, double w) {
        return -4*w +3*w+ 6;
    }
}
