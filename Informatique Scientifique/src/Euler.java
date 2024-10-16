public class Euler implements algo{
    public double a,b,alpha,n;
    public Euler(double a,double b,double alpha, double n){
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
        t[0]= a;
        w[0]= alpha;
        for(int i=1;i<=n;i++) {
            w[i]= w[i-1]+(h*f(t[i-1],w[i-1]));
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
        return -(t*w) + ((4*t)/w);
    }
}