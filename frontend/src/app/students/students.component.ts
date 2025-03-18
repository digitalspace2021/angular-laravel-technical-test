import { Component, OnInit } from '@angular/core';
import { StudentsService } from '../services/students.service';
import { RouterLink } from '@angular/router';
import { AlertComponent } from '../utils/alert/alert.component';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-students',
  standalone: true,
  imports: [RouterLink, AlertComponent, FormsModule],
  templateUrl: './students.component.html',
  styleUrl: './students.component.css',
})
export class StudentsComponent implements OnInit {
  students: any[] = [];
  paginations: any = {};
  hasErrors: boolean = false;
  success: boolean = false;
  searchTerm: string = '';

  constructor(private studentsService: StudentsService) {}

  ngOnInit() {
    this.loadStudents();
  }

  loadStudents(search: string = this.searchTerm, page: string = '1') {
    this.studentsService.getStudents(search, page).subscribe((response) => {
      this.students = response.data.data;
      const formattedpagination = response.data.links
        .map((link: any) =>
          link.label === '&laquo; Previous' || link.label === 'Next &raquo;'
            ? null
            : link
        )
        .filter((item: any) => item);

      this.paginations = formattedpagination;
    });
  }

  onSearch() {
    this.loadStudents();
  }

  deleteStudent(id: string) {
    this.studentsService.deleteStudent(id).subscribe({
      next: () => {
        this.success = true;
      },
      error: () => {
        this.hasErrors = true;
      },
      complete: () => {
        this.loadStudents();
      },
    });
  }
}
