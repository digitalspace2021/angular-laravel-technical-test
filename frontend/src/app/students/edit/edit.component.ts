import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { StudentsService } from '../../services/students.service';
import { AlertComponent } from '../../utils/alert/alert.component';

@Component({
  selector: 'app-edit',
  standalone: true,
  imports: [RouterLink, ReactiveFormsModule, AlertComponent],
  templateUrl: './edit.component.html',
  styleUrl: './edit.component.css',
})
export class EditComponent implements OnInit {
  editForm!: FormGroup;
  errors: Record<string, string[]> = {};
  hasErrors: boolean = false;
  success: boolean = false;
  studentId!: string;

  constructor(
    private fb: FormBuilder,
    private studentService: StudentsService,
    private route: ActivatedRoute,
    private router: Router
  ) {}

  ngOnInit(): void {
    // Obtener el ID de la URL
    this.studentId = this.route.snapshot.paramMap.get('id')!;

    // Crear formulario vacío antes de llenarlo con los datos del estudiante
    this.editForm = this.fb.group({
      name: ['', [Validators.required, Validators.minLength(3)]],
      lastName: ['', [Validators.required, Validators.minLength(3)]],
      email: ['', [Validators.required, Validators.email]],
      age: [
        '',
        [
          Validators.required,
          Validators.min(18),
          Validators.max(99),
          Validators.pattern('^[0-9]*$'),
        ],
      ],
      identification: [
        '',
        [
          Validators.required,
          Validators.pattern('^[0-9]*$'),
          Validators.minLength(9),
          Validators.maxLength(12),
        ],
      ],
    });

    // Cargar los datos del estudiante al formulario
    this.loadStudentData();
  }

  loadStudentData() {
    this.studentService.getStudent(this.studentId).subscribe({
      next: (response) => {
        console.log(response);

        const student = response.body.data;
        this.editForm.patchValue({
          name: student.name,
          lastName: student.last_name,
          email: student.email,
          age: student.age,
          identification: student.identification,
        });
      },
      error: () => {
        this.hasErrors = true;
        this.errors = { general: ['Failed to load student data.'] };
      },
    });
  }

  updateStudent() {
    if (this.editForm.valid) {
      this.errors = {};
      this.hasErrors = false;

      this.studentService
        .updateStudent(this.studentId, {
          name: this.editForm.value.name,
          last_name: this.editForm.value.lastName,
          email: this.editForm.value.email,
          age: this.editForm.value.age,
          identification: this.editForm.value.identification,
        })
        .subscribe({
          next: (res) => {
            console.log(res);
            this.success = true;
          },
          error: (error) => {
            if (error.status === 422) {
              this.errors = error.error.errors;
              this.hasErrors = true;
            } else {
              this.errors = { general: ['An unexpected error occurred.'] };
              this.hasErrors = true;
            }
          },
        });
    }
  }
}
