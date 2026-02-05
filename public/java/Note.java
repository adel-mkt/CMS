// Code java - CMS : calcul simple de la moyenne d'une UE
import java.util.Scanner;

public class Note{
    // Coefficients des différentes évaluations (en pourcentage)
    int coef_cc;
    int coef_partiel;
    int coef_examen;

    // Constructeur : initialise les coefficients de l'UE
    public Note(int coef_cc, int coef_partiel, int coef_examen){
        this.coef_cc = coef_cc;
        this.coef_partiel = coef_partiel;
        this.coef_examen = coef_examen;
    }

    // Calcule la moyenne pondérée à partir des notes fournies
    public double moyenne(double cc, double partiel, double examen){
        return (this.coef_cc/100.) * cc + (this.coef_partiel/100.) * partiel + (this.coef_examen/100.) * examen;
    }

  public static void main(String[] args) {

    // Lecture des notes saisies par l'utilisateur
    Scanner scan = new Scanner(System.in);

    System.out.println("Entre tes notes pour pfa: ");
    System.out.print("CC : ");
    double cc = scan.nextDouble();
    System.out.print("Examen : ");
    double examen = scan.nextDouble();

    // Vérification que les notes sont valides (entre 0 et 20)
    if(cc >= 0 && cc <= 20 && examen >= 0 && examen <= 20){

        // UE PFA : 40% CC, 60% examen, pas de partiel
        Note note = new Note(40, 0, 60); 

        // Calcul de la moyenne finale
        double moy = note.moyenne(cc, 0.0, examen);

        // Affichage du résultat
        System.out.println("\nLa moyenne de PFA est : " + String.format("%.2f", moy) + "/20\n");
        System.out.println(moy >= 10 ? "UE validée" : "UE non validée");
    }
    else {
        System.out.println("\nLes notes doivent être entre 0 et 20");
    }
    scan.close();
  }
}