import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { StudentsComponent } from './students/students.component';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, StudentsComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
  providers: [
    HttpClient
  ]
})
export class AppComponent {
  title = 'courses';
}
