

package views;

import java.awt.BorderLayout;
import java.awt.Dimension;
import org.jfree.chart.ChartFactory;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.plot.PiePlot;
import org.jfree.data.general.DefaultPieDataset;


public class Statistique extends javax.swing.JPanel {
     private DefaultPieDataset pieDataset;
    private JFreeChart pieChart;
    private PiePlot piePlot;
    private ChartPanel chartPanel;
    
   
    public Statistique() {
        initComponents();
        RepParAge();
        RepParSexe();
    }
    
     //Repartition de la population par sexe
    public void RepParSexe(){
        pieDataset= new DefaultPieDataset();
        int val=(int) Model.StatFunction.pourcent_sexe();
        pieDataset.setValue("Masculin ("+val+")", val);
        pieDataset.setValue("Feminin ("+(Model.StatFunction.effectif()-val)+")", (Model.StatFunction.effectif()-val));
        
        pieChart= ChartFactory.createPieChart("REPARTITION PAR SEXE", pieDataset, true, true, false);
        piePlot=(PiePlot) pieChart.getPlot();
        chartPanel=new ChartPanel(pieChart);
        chartPanel.setPreferredSize(new Dimension(380,300));
        SexeJFC.setLayout(new BorderLayout());
        SexeJFC.removeAll();
        SexeJFC.add(chartPanel,BorderLayout.EAST);
        SexeJFC.validate();
        
    }
    public void RepParAge(){
        pieDataset= new DefaultPieDataset();
        int val=(int) Model.StatFunction.get_moy_majeur();
        pieDataset.setValue("Majeur ("+val+")", val);
        pieDataset.setValue("Mineur ("+(Model.StatFunction.effectif()-val)+")", +(Model.StatFunction.effectif()-val));
        String nom="Majorité";
        pieChart= ChartFactory.createPieChart("REPARTITION PAR MAJORITE", pieDataset, true, true, false);
        
        piePlot=(PiePlot) pieChart.getPlot();
        chartPanel=new ChartPanel(pieChart);
        chartPanel.setPreferredSize(new Dimension(400,300));
        AgeJFC.setLayout(new BorderLayout());
        AgeJFC.removeAll();
        AgeJFC.add(chartPanel,BorderLayout.CENTER);
        AgeJFC.validate();
        
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {
        java.awt.GridBagConstraints gridBagConstraints;

        SexeJFC = new javax.swing.JPanel();
        AgeJFC = new javax.swing.JPanel();
        jPanel1 = new javax.swing.JPanel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();

        setLayout(new java.awt.GridBagLayout());

        SexeJFC.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));

        javax.swing.GroupLayout SexeJFCLayout = new javax.swing.GroupLayout(SexeJFC);
        SexeJFC.setLayout(SexeJFCLayout);
        SexeJFCLayout.setHorizontalGroup(
            SexeJFCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 357, Short.MAX_VALUE)
        );
        SexeJFCLayout.setVerticalGroup(
            SexeJFCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 238, Short.MAX_VALUE)
        );

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 0;
        gridBagConstraints.ipadx = 357;
        gridBagConstraints.ipady = 238;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(12, 33, 0, 0);
        add(SexeJFC, gridBagConstraints);

        AgeJFC.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(0, 0, 0)));

        javax.swing.GroupLayout AgeJFCLayout = new javax.swing.GroupLayout(AgeJFC);
        AgeJFC.setLayout(AgeJFCLayout);
        AgeJFCLayout.setHorizontalGroup(
            AgeJFCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 351, Short.MAX_VALUE)
        );
        AgeJFCLayout.setVerticalGroup(
            AgeJFCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 238, Short.MAX_VALUE)
        );

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 1;
        gridBagConstraints.gridy = 0;
        gridBagConstraints.ipadx = 351;
        gridBagConstraints.ipady = 238;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(12, 6, 0, 0);
        add(AgeJFC, gridBagConstraints);

        jPanel1.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(255, 255, 0), 2, true));

        jLabel2.setFont(new java.awt.Font("Calibri Light", 0, 14)); // NOI18N
        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("EFFECTIF TOTAL DE LA POPULATION: "+Model.StatFunction.effectif());

        jLabel3.setFont(new java.awt.Font("Calibri Light", 0, 14)); // NOI18N
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("EFFECTIF TOTAL DES MAJEURS: "+Model.StatFunction.get_moy_majeur());

        jLabel4.setFont(new java.awt.Font("Calibri Light", 0, 14)); // NOI18N
        jLabel4.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel4.setText("MOYENNE D'AGE DE LA POPULATION: "+Model.StatFunction.get_moy_age());

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jLabel4, javax.swing.GroupLayout.DEFAULT_SIZE, 712, Short.MAX_VALUE))
                .addContainerGap())
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addContainerGap()
                    .addComponent(jLabel2, javax.swing.GroupLayout.DEFAULT_SIZE, 706, Short.MAX_VALUE)
                    .addContainerGap()))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                .addContainerGap(41, Short.MAX_VALUE)
                .addComponent(jLabel3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel4)
                .addGap(17, 17, 17))
            .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                .addGroup(jPanel1Layout.createSequentialGroup()
                    .addGap(17, 17, 17)
                    .addComponent(jLabel2)
                    .addContainerGap(65, Short.MAX_VALUE)))
        );

        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 1;
        gridBagConstraints.gridwidth = 2;
        gridBagConstraints.ipadx = 479;
        gridBagConstraints.ipady = 35;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(18, 23, 0, 0);
        add(jPanel1, gridBagConstraints);
    }// </editor-fold>//GEN-END:initComponents


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPanel AgeJFC;
    private javax.swing.JPanel SexeJFC;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    // End of variables declaration//GEN-END:variables
}
